<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'description', 'price', 'stock', 'minimum', 'maximum', 'allergy_info', 'image', 'status', 'product_type_id'
    ];

    protected $dates = [
        'created_date'
    ];

    const CREATED_AT = 'CREATED_DATE';
    const UPDATED_AT = null;

    public function productType(){
        return $this->belongsTo(ProductType::class);
    }

    public function discount(){
        return $this->belongsToMany(Discount::class);
    }

    public function getPrice(){
        return discount_product_price($this);
    }

    public function hasDiscount(){
        return $this->getPrice() !== $this->price;
    }
}
