<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebtorsRequest;
use App\Repositories\All\Debtors\DebtorsInterface;
use Illuminate\Http\Request;

class DebtorsController extends Controller
{
    protected DebtorsInterface $repository;

    public function __construct(DebtorsInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DebtorsRequest $request)
    {
        $data = $this->repository->create($request->validated());

        return response()->json([
            'message' => 'Debtor created successfully',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->repository->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DebtorsRequest $request, string $id)
    {
        $this->repository->update($id, $request->validated());

        return response()->json([
            'message' => 'Debtor updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->delete($id);

        return response()->json([
            'message' => 'Debtor deleted successfully'
        ]);
    }
}
