<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'hotel_id'
    ];
    protected $casts = [
        "customer_id"=> "integer",
        "hotel_id"=> "integer"   
    ];







}
