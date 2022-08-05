<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hall_id',
        'type',
        'image',
        'video',
        'description',
        'from',
        'to',
        'showing_type',
    ];

    protected $casts=['from'];

    public function Hall(){

        return $this->belongsTo(Hall::class);
    }

    public function Tickets(){

        return $this->hasMany(Ticket::class);
        
    }

    public function Genres(){

        return $this->belongsToMany(Genre::class);
        
    }

    public function Times(){

        return $this->belongsToMany(Time::class);
        
    }
}
