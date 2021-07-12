<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|min:5|max:25|unique:users,username',
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|max:25|',
            'date_of_birth' => 'required|date|before:' . today()->subYears('17'),
            'gender' => 'required|in:0,1,2',
            'email' => 'required|min:5|max:255|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages(){
        return [
            'date_of_birth.before' => 'You must be 18 years old.'
        ];
    }
}
