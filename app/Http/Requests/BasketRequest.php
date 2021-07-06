<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
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
        $product = \App\Models\Product::findOrFail($this->product_id);
        return [
            'product_id' => 'required|unique:basket_items,product_id,NULL,NULL,basket_id,' . basket()->id,
            'quantity' => 'required|numeric|between:' . $product->minimum . ', ' . $product->maximum
        ];
    }

    public function messages(){
        return [
            'product_id.unique' => 'Product Already Added to Cart'
        ];
    }
}
