<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comments' => 'nullable|min:4|max:255',
            'rating' => 'required|integer|between:1,5',
            'product_id' => 'required|exists:products,id|unique:reviews,product_id,NULL,NULL,user_id,' . auth()->user()->id,
        ];
    }

    public function messages(){
        return [
            'product_id.unique' => 'You have already rated this product.'
        ];
    }
}
