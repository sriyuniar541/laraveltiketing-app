<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'concert_name',
        'address',
        'gate',
        'seat',
        'date',
        'price',
        'qty',
        'image',
        'user_id',
    ];
}

