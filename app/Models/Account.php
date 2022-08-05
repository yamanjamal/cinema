<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'points',
        'user_id',
    ];
    
    public function User(){

        return $this->belongsTo(User::class);
        
    }

    public function Invoices(){

        return $this->hasMany(Invoice::class);
        
    }
}
