<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Repositories\All\Sales\SalesInterface;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    private SalesInterface $salesRepository;

    public function __construct(SalesInterface $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->salesRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesRequest $request)
    {
        $data = $request->validated();

        $sale = $this->salesRepository->create($data);

        return response()->json([
            'message' => 'Sale created successfully',
            'data' => $sale
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = $this->salesRepository->find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        return response()->json($sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesRequest $request, string $id)
    {
        $data = $request->validated();

        $updated = $this->salesRepository->update($id, $data);

        if (!$updated) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        return response()->json(['message' => 'Sale updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->salesRepository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        return response()->json(['message' => 'Sale deleted successfully']);
    }
}
