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

    public function basketItem(){
        return $this->hasMany(BasketItem::class);
    }

    public function getPrice(){
        return discount_product_price($this);
    }

    public function hasDiscount(){
        return $this->getPrice() !== $this->price;
    }

    public function order(){
        return $this->belongsToMany(Order::class)->withPivot(['name', 'price', 'quantity']);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function getRating(){
        return round($this->review()->avg('rating'));
    }

    public function getRatingBadge(){
        return get_rating_badge($this->getRating(), 'center');
    }
}
