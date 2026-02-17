<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleItemsRequest;
use App\Models\Sale;
use App\Repositories\All\SaleItems\SaleItemsInterface;
use Illuminate\Http\Request;

class SaleItemsController extends Controller
{
    private SaleItemsInterface $saleItemsRepository;

    public function __construct(SaleItemsInterface $saleItemsRepository)
    {
        $this->saleItemsRepository = $saleItemsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->saleItemsRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleItemsRequest $request)
    {
        $data = $request->validated();

        $saleItem = $this->saleItemsRepository->create($data);

        return response()->json([
            'message' => 'Sale item created successfully',
            'data' => $saleItem
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $saleItem = $this->saleItemsRepository->find($id);

        if (!$saleItem) {
            return response()->json(['message' => 'Sale item not found'], 404);
        }

        return response()->json($saleItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleItemsRequest $request, string $id)
    {
        $data = $request->validated();

        $updated = $this->saleItemsRepository->update($id, $data);

        if (!$updated) {
            return response()->json(['message' => 'Sale item not found'], 404);
        }

        return response()->json(['message' => 'Sale item updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->saleItemsRepository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Sale item not found'], 404);
        }

        return response()->json(['message' => 'Sale item deleted successfully']);
    }
}
