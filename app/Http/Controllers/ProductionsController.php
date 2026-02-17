<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductionsRequest;
use App\Repositories\All\Productions\ProductionsInterface;
use Illuminate\Http\Request;

class ProductionsController extends Controller
{
    private ProductionsInterface $productionsRepository;

    public function __construct(ProductionsInterface $productionsRepository)
    {
        $this->productionsRepository = $productionsRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->productionsRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductionsRequest $request)
    {
        $production = $this->productionsRepository->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Production created successfully',
            'data' => $production
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $production = $this->productionsRepository->find($id);

        if (!$production) {
            return response()->json(['message' => 'Production not found'], 404);
        }

        return response()->json($production);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductionsRequest $request, string $id)
    {
        $updated = $this->productionsRepository->update(
            $id,
            $request->validated()
        );

        if (!$updated) {
            return response()->json(['message' => 'Production not found'], 404);
        }

        return response()->json(['message' => 'Production updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->productionsRepository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Production not found'], 404);
        }

        return response()->json(['message' => 'Production deleted successfully']);
    }
}
