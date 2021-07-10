<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id', 'time_id', 'collection_date'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function day(){
        return $this->belongsTo(Day::class);
    }

    public function time(){
        return $this->belongsTo(Time::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
