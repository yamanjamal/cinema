<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'date',
        'status',
        'totalprice',
    ];


    public function User(){

        return $this->belongsTo(User::class);
    }

    public function Invoice(){

        return $this->hasOne(Invoice::class);
    }


    public function OrederItems(){

        return $this->hasMany(OrederItem::class);
        
    }
}
