<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountsRequest;
use App\Repositories\All\BankAccounts\BankAccountsInterface;
use Illuminate\Http\Request;

class BankAccountsController extends Controller
{
    private BankAccountsInterface $bankAccountsRepository;

    public function __construct(BankAccountsInterface $bankAccountsRepository)
    {
        $this->bankAccountsRepository = $bankAccountsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->bankAccountsRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankAccountsRequest $request)
    {
        $bankAccount = $this->bankAccountsRepository->create($request->validated());
        return response()->json($bankAccount, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bankAccount = $this->bankAccountsRepository->find($id);

        if (! $bankAccount) {
            return response()->json(['message' => 'Bank account not found'], 404);
        }

        return response()->json($bankAccount);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankAccountsRequest $request, string $id)
    {
        $bankAccount = $this->bankAccountsRepository->find($id);

        if (! $bankAccount) {
            return response()->json(['message' => 'Bank account not found'], 404);
        }

        $this->bankAccountsRepository->update($id, $request->validated());

        return response()->json($this->bankAccountsRepository->find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->bankAccountsRepository->delete($id);

        if (! $deleted) {
            return response()->json(['message' => 'Bank account not found'], 404);
        }

        return response()->json(['message' => 'Bank account deleted successfully']);
    }
}
