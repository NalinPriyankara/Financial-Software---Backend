<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductionItemsRequest;
use App\Repositories\All\ProductionItems\ProductionItemsInterface;
use Illuminate\Http\Request;

class ProductionItemsController extends Controller
{
    private ProductionItemsInterface $productionItemsRepository;

    public function __construct(ProductionItemsInterface $productionItemsRepository)
    {
        $this->productionItemsRepository = $productionItemsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->productionItemsRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductionItemsRequest $request)
    {
        $productionItem = $this->productionItemsRepository->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Production item created successfully',
            'data' => $productionItem
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productionItem = $this->productionItemsRepository->find($id);

        if (!$productionItem) {
            return response()->json(['message' => 'Production item not found'], 404);
        }

        return response()->json($productionItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductionItemsRequest $request, string $id)
    {
        $updated = $this->productionItemsRepository->update(
            $id,
            $request->validated()
        );

        if (!$updated) {
            return response()->json(['message' => 'Production item not found'], 404);
        }

        return response()->json(['message' => 'Production item updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->productionItemsRepository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Production item not found'], 404);
        }

        return response()->json(['message' => 'Production item deleted successfully']);
    }
}
