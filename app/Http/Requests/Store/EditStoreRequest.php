<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class EditStoreRequest extends FormRequest
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
            'logo' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Store name is required",
            "name.string" => "Store name must be a string",
            "address.required" => "Store Address is required",
            "address.string" => "Store Address must be a string",
        ];
    }
}
