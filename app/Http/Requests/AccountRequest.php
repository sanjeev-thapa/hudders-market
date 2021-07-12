<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|max:25',
            'date_of_birth' => 'required|date|before:' . today()->subYears('17'),
            'gender' => 'required|in:0,1,2',
            'email' => 'required|min:5|max:255|unique:users,email,' . auth()->user()->id,
            'phone' => 'required|digits:10|unique:users,phone,' . auth()->user()->id,
        ];
    }

    public function messages(){
        return [
            'date_of_birth.before' => 'You must be 18 years old.'
        ];
    }
}
