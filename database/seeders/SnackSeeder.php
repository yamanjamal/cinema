<?php

namespace Database\Seeders;

use App\Models\Snack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Snack::create([
            'name'       =>'Pop Corn',
            'description'=>'Pop corns with salt',
            'image'      =>'img/p1.jpg',
            'price'   =>'5000',
        ]); 
        Snack::create([
            'name'       =>'Pepsi',
            'description'=>'Pesonal Pepsi',
            'image'      =>'img/p5.jpg',
            'price'   =>'2000',
        ]);
        Snack::create([
            'name'       =>'Ice Smothy',
            'description'=>'Ice Smothy',
            'image'      =>'img/s2.jpg',
            'price'   =>'3000',
        ]);
        Snack::create([
            'name'       =>'7up',
            'description'=>'Pesonal 7up',
            'image'      =>'img/7.jpg',
            'price'   =>'2000',
        ]);  
    }
}
