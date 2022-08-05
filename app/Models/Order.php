<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'snack_name',
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


    public function Snacks(){

        return $this->belongsToMany(Snack::class);
        
    }
}
