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
        $user_emails = User::select('email')->get();
        $forbidden_emails = "";
        for ($i = 0; $i < count($user_emails); $i++) {
            if ($i == count($user_emails) - 1 && ($user_emails[$i]->email != Auth::user()->email)) {
                $forbidden_emails .= $user_emails[$i]->email;
            } else if ($user_emails[$i]->email != Auth::user()->email) {
                $forbidden_emails .= $user_emails[$i]->email  . ",";
            }
        }
        // dd($forbidden_emails);
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|notin:' . $forbidden_emails,
            'address' => 'required|string',
            'about_me' => 'required|string',
            'user_picture' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            "email.notin" => "This email is already taken!",
        ];
    }
}
