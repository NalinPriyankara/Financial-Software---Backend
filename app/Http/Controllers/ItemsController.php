<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsRequest;
use App\Models\Item;
use App\Repositories\All\Items\ItemsInterface;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    private ItemsInterface $itemsRepository;

    public function __construct(ItemsInterface $itemsRepository)
    {
        $this->itemsRepository = $itemsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->itemsRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemsRequest $request)
    {
        $item = $this->itemsRepository->create($request->validated());
        return response()->json($item, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->itemsRepository->find($id);

        if (! $item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemsRequest $request, string $id)
    {
        $updated = $this->itemsRepository->update($id, $request->validated());

        if (! $updated) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json(['message' => 'Item updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->itemsRepository->delete($id);

        if (! $deleted) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json(['message' => 'Item deleted successfully']);
    }
}
