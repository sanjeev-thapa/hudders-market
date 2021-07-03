<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductTypeRequest extends FormRequest
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
            'product_type' => 'required|max:50|unique:product_types,name,' . request('id'),
            'image' => 'mimes:jpeg,jpg,png|max:1024',
            'shop' => 'required|numeric|exists:shops,id,user_id,' . auth()->user()->id
        ];
    }
}
