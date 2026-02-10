<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanySetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'fax_number' => 'nullable|string',
            'email_address' => 'required|email',
            'official_company_number' => 'required|string',
            'company_website' => 'required|string',
            'GSTNo' => 'required|string',
            'home_currency' => 'required|string',
            'annual_turnover_estimate' => 'required|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'delete_company_logo' => 'boolean',
            'company_logo_on_views' => 'boolean',
            'owner_name' => 'required|string',
            'owner_email' => 'required|email',
            'owner_telephone' => 'required|string',
            'fiscal_year' => 'required|string',
            'tax_periods' => 'nullable|integer',
            'tax_last_period' => 'integer',
            'no_of_workers' => 'required|integer',
            'business_type' => 'required|string',
            'company_brief' => 'required|string',
        ];
    }
}
