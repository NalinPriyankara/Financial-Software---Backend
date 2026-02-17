<?php

namespace App\Http\Controllers;

use App\Http\Requests\StocksRequest;
use App\Repositories\All\Stocks\StocksInterface;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    private StocksInterface $stocksRepository;

    public function __construct(StocksInterface $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->stocksRepository->all()->load('item')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StocksRequest $request)
    {
        $stock = $this->stocksRepository->create($request->validated());
        return response()->json($stock, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stock = $this->stocksRepository->find($id);

        if (! $stock) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        return response()->json($stock->load('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StocksRequest $request, string $id)
    {
        $updated = $this->stocksRepository->update($id, $request->validated());

        if (! $updated) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        return response()->json(['message' => 'Stock updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->stocksRepository->delete($id);

        if (! $deleted) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        return response()->json(['message' => 'Stock deleted successfully']);
    }
}
