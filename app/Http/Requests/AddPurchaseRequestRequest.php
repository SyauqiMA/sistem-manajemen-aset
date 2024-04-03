<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPurchaseRequestRequest extends FormRequest
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
            'pr-number' => 'required|unique:purchase_request,purchase_request_number',
            'pr-desc' => 'required',
            'pr-date' => 'required'
        ];
    }

    /**
     * Validation Error Messages
     */
    public function messages(): array
    {
        return [
            'pr-number.unique' => 'Purchase Request Number telah terambil',
            'pr-number.required' => 'Purchase Request Number belum terisi',
            'pr-desc.required' => 'Deskripsi Purchase Request belum terisi'
        ];
    }
}
