<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DiscountPercentage;

class DiscountRequest extends FormRequest
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
            'discount_name' => 'required|max:50|unique:discounts,name,NULL,NULL,user_id,' . auth()->user()->id,
            'type' => 'required|in:0,1',
            'amount' => ['required','numeric','gt:0',new DiscountPercentage('type', 1)],
            'date' => 'nullable|date|after:yesterday'
        ];
    }

    public function messages(){
        return [
            'discount_name.unique' => 'Duplicate :attribute',
            'date.after' => ':Attribute must be today or in future'
        ];
    }
}
