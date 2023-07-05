<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
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
        'tiketing_id',
        'total_price',
        'status' 
    ];
   
}
