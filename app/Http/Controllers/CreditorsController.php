<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditorsRequest;
use App\Repositories\All\Creditors\CreditorsInterface;
use Illuminate\Http\Request;

class CreditorsController extends Controller
{
    protected CreditorsInterface $repository;

    public function __construct(CreditorsInterface $repository)
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
    public function store(CreditorsRequest $request)
    {
        $data = $this->repository->create($request->validated());

        return response()->json([
            'message' => 'Creditor created successfully',
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
    public function update(CreditorsRequest $request, string $id)
    {
        $data = $this->repository->update($id, $request->validated());

        return response()->json([
            'message' => 'Creditor updated successfully',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->delete($id);

        return response()->json([
            'message' => 'Creditor deleted successfully'
        ]);
    }
}
