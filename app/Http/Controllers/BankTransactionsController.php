<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankTransactionsRequest;
use App\Repositories\All\BankTransactions\BankTransactionsInterface;
use Illuminate\Http\Request;

class BankTransactionsController extends Controller
{
    private BankTransactionsInterface $repository;

    public function __construct(BankTransactionsInterface $repository)
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
    public function store(BankTransactionsRequest $request)
    {
        $data = $request->validated();
        $record = $this->repository->create($data);

        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = $this->repository->find($id);

        if (!$record) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->repository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json(['message' => 'Transaction deleted']);
    }
}
