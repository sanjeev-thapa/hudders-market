<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'day_id' => 'required|exists:days,id',
            'time_id' => 'required|exists:times,id',
            'payment_method' => 'required|in:0,1'
        ];
    }

    public function attributes(){
        return [
            'day_id' => 'Collection Day',
            'time_id' => 'Collection Time'
        ];
    }
}
