<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'amount', 'expiry_date', 'user_id'
    ];

    protected $dates = [
        'expiry_date'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function user(){
        $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class);
    }
}
