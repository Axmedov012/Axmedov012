<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'contact_name'=>'required|string',
            'contact_email'=>'required|email|unique:clients',
            'contact_phone'=>'required|string',
            'company_name'=>'required|string',
            'company_address'=>'required|string',
            'company_city'=>'required|string',
            'company_zip'=>'required|integer',
            'company_vat'=>'required|numeric',
        ];
    }
}
