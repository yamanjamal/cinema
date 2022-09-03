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
            'image'      =>'upload/Imgs/p1.jpg',
            'price'   =>'500',
        ]); 
        Snack::create([
            'name'       =>'Pepsi',
            'description'=>'Pesonal Pepsi',
            'image'      =>'upload/Imgs/p5.jpg',
            'price'   =>'200',
        ]);
        Snack::create([
            'name'       =>'Ice Smothy',
            'description'=>'Ice Smothy',
            'image'      =>'upload/Imgs/s2.jpg',
            'price'   =>'300',
        ]);
        Snack::create([
            'name'       =>'7up',
            'description'=>'Pesonal 7up',
            'image'      =>'upload/Imgs/7.jpg',
            'price'   =>'200',
        ]);  
    }
}
