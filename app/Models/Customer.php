<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bookings;
class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","mobile","gender","email"
    ];
    protected $casts = [
        "name"=> "string",
        "mobile"=> "string",
        "gender"=> "string",
        "email"=> "string"
    ];
    
    public function hotels(){
        return $this->belongsToMany(Hotel::class,"customer_hotel");
    }
    
    public function hotelsRating(){
        return $this->hasMany(Rating::class);
    }
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
   



}
