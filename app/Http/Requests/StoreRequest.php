<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'address' => 'required|string',
            'logo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Store name is required",
            "name.string" => "Store name must be a string",
            "address.required" => "Store Address is required",
            "address.string" => "Store Address must be a string",
            "logo.required" => "You must choose a store logo",
        ];
    }
}
