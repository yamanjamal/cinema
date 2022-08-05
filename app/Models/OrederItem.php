<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrederItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'ammount',
        'order_id',
        'snack_id',
    ];
    
    public function Order(){

        return $this->belongsTo(Order::class);
        
    }
    
    public function Snack(){

        return $this->belongsTo(Snack::class);
        
    }
}
