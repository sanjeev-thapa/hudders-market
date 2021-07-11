<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|min:5|max:50|unique:products,name,' . request('id'),
            'product_type_id' => 'required|in:' . auth()->user()->productType->pluck('id')->implode(','),
            'description' => 'required|min:200|max:1000',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|integer|gt:0',
            'minimum' => 'required|integer|gt:0|lt:maximum',
            'maximum' => 'required|integer|gt:minimum|lte:stock|lte:20',
            'allergy_info' => 'nullable|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'discount_id' => 'nullable|numeric|exists:discounts,id,user_id,' . auth()->user()->id
        ];
    }

    public function messages(){
        $maximumLte = request('maximum') > 20 ? '20' : 'stock';
        return [
            'minimum.lt' => ':Attribute must be less than maximum',
            'maximum.gt' => ':Attribute must be greater than minimum',
            'maximum.lte' => ":Attribute must be less than or equal to $maximumLte"
        ];
    }

    public function attributes(){
        return [
            'product_type_id' => 'Product Type',
            'discount_id' => 'Discount'
        ];
    }
}
