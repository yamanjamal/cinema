<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'available',
        'code',
    ];

    public function Hall(){

        return $this->belongsTo(Hall::class);
    }

    public function Tickets(){

        return $this->hasMany(Ticket::class);
        
    }
}
