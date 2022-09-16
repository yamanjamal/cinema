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
            'image'      =>'upload/Imgs/16631218782 (4).jpg',
            'price'   =>'50',
        ]); 
        Snack::create([
            'name'       =>'Pepsi',
            'description'=>'Pesonal Pepsi',
            'image'      =>'upload/Imgs/16631248532 (7).jpg',
            'price'   =>'20',
        ]);
        Snack::create([
            'name'       =>'Ice Smothy',
            'description'=>'Ice Smothy',
            'image'      =>'upload/Imgs/16631219432 (10).jpg',
            'price'   =>'30',
        ]);
        Snack::create([
            'name'       =>'7up',
            'description'=>'Pesonal 7up',
            'image'      =>'upload/Imgs/16631219572 (20).jpg',
            'price'   =>'20',
        ]);  
    }
}
