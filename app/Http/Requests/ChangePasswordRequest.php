<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CurrentPassword;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required', new CurrentPassword()],
            'password' => 'required|min:8|not_in:' . $this->current_password . '|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages(){
        return [
            'password.not_in' => ':Attribute cannot be same as current password'
        ];
    }
}
