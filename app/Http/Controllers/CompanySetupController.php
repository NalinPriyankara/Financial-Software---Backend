<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanySetupRequest;
use App\Repositories\All\CompanySetup\CompanySetupInterface;
use Faker\Provider\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanySetupController extends Controller
{
    private CompanySetupInterface $companySetupRepository;

    public function __construct(CompanySetupInterface $companySetupRepository)
    {
        $this->companySetupRepository = $companySetupRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->companySetupRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanySetupRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')
                ->store('company_logos', 'public');
        }

        $company = $this->companySetupRepository->create($data);
        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = $this->companySetupRepository->find($id);

        if (! $company) {
            return response()->json(['message' => 'Company not found'], 404);
        }

        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanySetupRequest $request, string $id)
    {
        $company = $this->companySetupRepository->find($id);
        if (! $company) {
            return response()->json(['message' => 'Company not found'], 404);
        }

        $data = $request->validated();

        if ($request->hasFile('company_logo')) {
            if ($company->company_logo) {
                Storage::disk('public')->delete($company->company_logo);
            }
            $data['company_logo'] = $request->file('company_logo')
                ->store('company_logos', 'public');
        }

        $this->companySetupRepository->update($id, $data);
        return response()->json(['message' => 'Company updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = $this->companySetupRepository->find($id);
        if (! $company) {
            return response()->json(['message' => 'Company not found'], 404);
        }

        if ($company->company_logo) {
            Storage::disk('public')->delete($company->company_logo);
        }

        $this->companySetupRepository->delete($id);
        return response()->json(['message' => 'Company deleted successfully']);
    }
}
