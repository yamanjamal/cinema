<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'starttime',
        'endtime',
        'active',
    ];

    public function Movies(){

        return $this->belongsToMany(Movie::class);
        
    }
}
