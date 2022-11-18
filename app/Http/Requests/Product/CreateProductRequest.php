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
        $stores = Store::select('id')->get();
        $store_ids = "";
        for ($i = 0; $i < count($stores); $i++) {
            if ($i == count($stores) - 1) {
                $store_ids .= $stores[$i]->id;
            } else {
                $store_ids .= $stores[$i]->id  . ",";
            }
        }
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
            'store' => 'required|numeric|in:' . $store_ids,
            'product_picture' => 'required|mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [];
    }
}
