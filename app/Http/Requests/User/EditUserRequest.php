<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
        $current_user_id = Auth::user()->id;
        return [
            'name' => 'required|string',
            'email' => "required|string|unique:users,email,$current_user_id",
            'address' => 'required|string',
            'about_me' => 'required|string',
            'user_picture' => 'mimes:jpeg,jpg,png',
        ];
    }
}
