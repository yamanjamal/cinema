<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'seat_id',
        'movie_id',
        'active',
        'user_id',
        'price_id',
        'glasses',
        'date',
        'starttime',
    ];
    protected $casts=['date'];

    public function User(){

        return $this->belongsTo(User::class);

    }

    public function Seat(){

        return $this->belongsTo(Seat::class);

    }

    public function Movie(){

        return $this->belongsTo(Movie::class);

    }

    public function Price(){

        return $this->belongsTo(Price::class);

    }
}
