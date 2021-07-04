<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'cookie_id', 'user_id'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function basketItem(){
        return $this->belongsTo(BasketItem::class);
    }
}
