<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_phone',
        'total_price',
        'account_id',
        'order_id',
    ];
    
    public function Account(){

        return $this->belongsTo(Account::class);
        
    }
    
    public function Order(){

        return $this->belongsTo(Order::class);
        
    }
}
