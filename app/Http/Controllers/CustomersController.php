<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomersRequest;
use App\Repositories\All\Customers\CustomersInterface;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    private CustomersInterface $customersRepository;

    public function __construct(CustomersInterface $customersRepository)
    {
        $this->customersRepository = $customersRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->customersRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomersRequest $request)
    {
        $customer = $this->customersRepository->create($request->validated());
        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = $this->customersRepository->find($id);

        if (! $customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomersRequest $request, string $id)
    {
        $updated = $this->customersRepository->update($id, $request->validated());

        if (! $updated) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json(['message' => 'Customer updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->customersRepository->delete($id);

        if (! $deleted) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
