<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    * @return array<string, mixed>
    */
    public function rules()
    {
        return [
            "email"=> [
                'required',
                'max:300',
                'email',
                'unique:users,email'
            ],
            "name"=> [
                'required',
                'alpha',
                'min:2',
                'max:250'
            ],
            "password"=> [
                'required',
                'confirmed',
                Password::min(8)->mixedCase(),
                'max:600'
            ],
            "remember"=> ['nullable','boolean'],
        ];
    }

    /**
        * Get the error messages for the defined validation rules.
        *
        * @return array
        */
    public function messages()
    {
        return [
            'email.required' => 'The field email address is required',
            'email.email' => 'Invalid email',
            'email.max' => 'The field email address do not must have more biger than 300 characters',
            'email.unique' => "this email is already in use, please use another one or reset your password",
            'name.required' => 'The field full name is required',
            'name.alpha' => 'The field full name only must have alphabetics characters',
            'name.min' => 'The field full name must be biger than 2 characters',
            'name.max' => 'The field full name do not must have more biger than 250 characters',
            'password.required' => 'The field password is required',
            'password.min' => 'The field password must be biger than 8 characters',
            'password.max' => 'The field password do not must have more bigger than 600 characters',
            'password.confirmed' => 'Passwords do not match'
        ];
    }
}
