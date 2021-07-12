<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'status', 'user_id'
    ];

    const CREATED_AT = 'CREATED_DATE';
    const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productType(){
        return $this->hasMany(ProductType::class);
    }

    public function product(){
        return $this->hasManyThrough(Product::class, ProductType::class);
    }
}
