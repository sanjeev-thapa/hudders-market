<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'gateway', 'transaction_id', 'amount', 'fee', 'order_id', 'user_id'
    ];

    protected $dates = [
        'paid_date'
    ];

    const CREATED_AT = 'PAID_DATE';
    const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
