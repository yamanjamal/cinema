<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_name',
        'user_phone',
        'order_id',
        'total_price',
    ];
    
    public function Account(){

        return $this->belongsTo(Account::class);
        
    }
    
    public function Order(){

        return $this->belongsTo(Order::class);
        
    }
}
