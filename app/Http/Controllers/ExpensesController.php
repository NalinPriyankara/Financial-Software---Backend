<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpensesRequest;
use App\Models\Expense;
use App\Repositories\All\Expenses\ExpensesInterface;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    private ExpensesInterface $expensesRepository;

    public function __construct(ExpensesInterface $expensesRepository)
    {
        $this->expensesRepository = $expensesRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->expensesRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpensesRequest $request)
    {
        $expense = $this->expensesRepository->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Expense created successfully',
            'data' => $expense
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expense = $this->expensesRepository->find($id);

        if (!$expense) {
            return response()->json(['message' => 'Expense not found'], 404);
        }

        return response()->json($expense);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpensesRequest $request, string $id)
    {
        $updated = $this->expensesRepository->update(
            $id,
            $request->validated()
        );

        if (!$updated) {
            return response()->json(['message' => 'Expense not found'], 404);
        }

        return response()->json(['message' => 'Expense updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->expensesRepository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Expense not found'], 404);
        }

        return response()->json(['message' => 'Expense deleted successfully']);
    }
}
