<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\City;
use App\Models\Booking;
use App\Models\Ratings;
class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","city_id"
    ];
    protected $casts = [
        "name"=> "string",
        "city_id"=> "integer",
        
    ];

    public function City(){

     return $this->belongsTo(City::class);
   
       }
       public function ratings(){

        return $this->hasMany(Rating::class);
      
          }
          public function bookings(){

            return $this->hasMany(Booking::class);
          
              }











}
