<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'dob', 'gender', 'email', 'phone', 'password', 'apex_password', 'role', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'apex_password'
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'dob'
    ];

    const CREATED_AT = 'CREATED_DATE';
    const UPDATED_AT = 'UPDATED_DATE';

    public function verification(){
        return $this->hasMany(Verification::class);
    }

    public function shop(){
        return $this->hasMany(Shop::class);
    }

    public function productType(){
        return $this->hasManyThrough(ProductType::class, Shop::class);
    }

    public function product(){
        $productTypeId = $this->productType->pluck('id');
        return Product::whereIn('product_type_id', $productTypeId);
    }

    public function discount(){
        return $this->hasMany(Discount::class);
    }

    public function basket(){
        return $this->hasMany(Basket::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }
}
