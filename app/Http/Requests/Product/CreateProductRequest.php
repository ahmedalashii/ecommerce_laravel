<?php

namespace App\Http\Requests\Product;

use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'description' => 'required|string',
            'base_price' => [
                'required',
                'numeric',
                'min:10',
                'regex:/^(([0-9]*)(\.([0-9]+))?)$/',
            ],
            'discount_price' => [
                'required',
                'numeric',
                'min:5',
                'regex:/^(([0-9]*)(\.([0-9]+))?)$/',
            ],
            // in stores table, id column, deleted_at = null
            'store' => 'required|numeric|exists:stores,id,deleted_at,NULL',
            'product_picture' => 'required|mimes:jpeg,jpg,png'
        ];
    }
}
