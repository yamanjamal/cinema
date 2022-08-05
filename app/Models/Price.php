<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_price',
        'glass_price',
    ];

    
    public function Tickets(){

        return $this->hasMany(Ticket::class);
        
    }
}
