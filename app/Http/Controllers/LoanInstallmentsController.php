<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanInstallmentsRequest;
use App\Repositories\All\LoanInstallments\LoanInstallmentsInterface;
use Illuminate\Http\Request;

class LoanInstallmentsController extends Controller
{
    protected LoanInstallmentsInterface $repository;

    public function __construct(LoanInstallmentsInterface $repository)
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
    public function store(LoanInstallmentsRequest $request)
    {
        $data = $this->repository->create($request->validated());

        return response()->json([
            'message' => 'Installment created successfully',
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
    public function update(LoanInstallmentsRequest $request, string $id)
    {
        $data = $this->repository->update($id, $request->validated());

        return response()->json([
            'message' => 'Installment updated successfully',
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
            'message' => 'Installment deleted successfully'
        ]);
    }
}
