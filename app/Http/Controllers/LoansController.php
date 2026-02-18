<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoansRequest;
use App\Repositories\All\Loans\LoansInterface;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    private LoansInterface $loansRepository;

    public function __construct(LoansInterface $loansRepository)
    {
        $this->loansRepository = $loansRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->loansRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoansRequest $request)
    {
        $loan = $this->loansRepository->create($request->validated());
        return response()->json($loan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loan = $this->loansRepository->find($id);

        if (! $loan) {
            return response()->json(['message' => 'Loan not found'], 404);
        }

        return response()->json($loan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoansRequest $request, string $id)
    {
        $loan = $this->loansRepository->find($id);

        if (! $loan) {
            return response()->json(['message' => 'Loan not found'], 404);
        }

        $this->loansRepository->update($id, $request->validated());
        return response()->json($this->loansRepository->find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->loansRepository->delete($id);

        if (! $deleted) {
            return response()->json(['message' => 'Loan not found'], 404);
        }

        return response()->json(['message' => 'Loan deleted successfully']);
    }
}
