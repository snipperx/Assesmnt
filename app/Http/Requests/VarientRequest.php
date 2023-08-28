<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VarientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'product_id' => 'required',
            'sap_product_code' => 'required',
            'web_product_code' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required!',
            'product_id.required' => 'Select a product!',
            'sap_product_code.required' => 'Sap Product Code is required!',
            'web_product_code.required' => 'Web Product Code is required!',
        ];
    }
}

