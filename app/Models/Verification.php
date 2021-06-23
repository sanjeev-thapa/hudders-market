<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'link', 'user_id'
    ];

    const CREATED_AT = 'CREATED_DATE';
    const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
