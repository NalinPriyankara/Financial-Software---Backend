<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalesRequest extends FormRequest
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
        $saleId = $this->route('sale') ?? $this->route('id');

        return [
            'invoice_no'   => ['required','string', Rule::unique('sales','invoice_no')->ignore($saleId)],
            'customer_id'  => 'required|exists:customers,id',
            'total_amount' => 'required|numeric|min:0',
            'paid_amount'  => 'required|numeric|min:0',
            'balance'      => 'required|numeric|min:0',
            'sale_date'    => 'required|date',
            'created_by'   => 'required|exists:user_managements,id',
        ];
    }
}
