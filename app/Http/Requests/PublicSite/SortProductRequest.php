<?php

namespace App\Http\Requests\PublicSite;

use Illuminate\Foundation\Http\FormRequest;

class SortProductRequest extends FormRequest
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
        $sort_ways = 'ASC,DESC';
        return [
            'sort_way' => 'string|in:' . $sort_ways,
        ];
    }
}
