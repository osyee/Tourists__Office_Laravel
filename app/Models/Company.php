<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'address',
        'phone'
    ];
    protected $casts = [
        "title"=> "string",
        "address"=> "string",
        "phone"=> "integer"
        
    ];

    public function tickets()
    {
    
        return $this->hasMany(Ticket::class);
       }


}
