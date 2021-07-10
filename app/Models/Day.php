<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'day'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function collectionSlot(){
        return $this->hasMany(CollectionSlot::class);
    }
}
