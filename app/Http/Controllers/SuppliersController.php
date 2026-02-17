<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuppliersRequest;
use App\Repositories\All\Suppliers\SuppliersInterface;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    private SuppliersInterface $suppliersRepository;

    public function __construct(SuppliersInterface $suppliersRepository)
    {
        $this->suppliersRepository = $suppliersRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->suppliersRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuppliersRequest $request)
    {
        $supplier = $this->suppliersRepository->create($request->validated());
        return response()->json($supplier, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = $this->suppliersRepository->find($id);

        if (! $supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuppliersRequest $request, string $id)
    {
        $updated = $this->suppliersRepository->update($id, $request->validated());

        if (! $updated) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        return response()->json(['message' => 'Supplier updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->suppliersRepository->delete($id);

        if (! $deleted) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
