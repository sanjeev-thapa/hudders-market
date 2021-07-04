<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity', 'basket_id', 'product_id'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function basket(){
        return $this->belongsTo(Basket::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
