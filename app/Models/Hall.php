<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function Movies(){

        return $this->hasMany(Movie::class);
        
    }
    public function Seats(){

        return $this->hasMany(Seat::class);
        
    }
}
