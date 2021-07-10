<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_slot_id', 'user_id'
    ];

    const CREATED_AT = 'CREATED_DATE';
    const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class)->withPivot(['name', 'price', 'quantity']);
    }
}
