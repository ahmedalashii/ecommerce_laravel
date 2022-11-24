<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
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
            'dashboard_logo' => 'nullable|mimes:jpeg,jpg,png,svg',
            'site_logo' => 'nullable|mimes:jpeg,jpg,png,svg',
            'country' => 'required|string',   
            'address' => 'required|string',   
            'description' => 'required|string',   
        ];
    }
}
