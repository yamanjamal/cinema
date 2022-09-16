<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::create([
            'name'       =>'Big Hero 6',
            'description'=>'A special bond develops between plus-sized inflatable robot Baymax, and prodigy Hiro Hamada, who team up with a group of friends to form a band of high-tech heroes.',
            'image'      =>'upload/Imgs/1663121398big hero 6.jpg',
            'video'      =>'8IdMPpKMdcc',
            'from'       =>'2020-07-11',
            'to'         =>'2020-07-15',
            'type'       => '2D',
            'hall_id'    => 2,
        ]); 

        Movie::create([
            'name'       =>'UP',
            'description'=>'A special bond develops between plus-sized inflatable robot Baymax, and prodigy Hiro Hamada, who team up with a group of friends to form a band of high-tech heroes.',
            'image'      =>'upload/Imgs/1663121539up.jpg',
            'video'   =>'Ajcdb4FAL7A',
            'from'       =>'2020-07-11',
            'to'         =>'2020-07-15',
            'type'       => '2D',
            'hall_id'    => 2,
        ]);

        Movie::create([
            'name'       =>'Frozen',
            'description'=>'Young princess Anna of Arendelle dreams about finding true love at her sister Elsa’s coronation. ',
            'image'      =>'upload/Imgs/16631216202 (25).jpg',
            'video'   =>'L0MK7qz13bU',
            'from'       =>'2020-07-11',
            'to'         =>'2020-07-15',
            'type'       => '2D',
            'hall_id'    => 1,
        ]); 

        Movie::create([
            'name'       =>'Trolls',
            'description'=>'Lovable and friendly, the trolls love to play around. But one day, a mysterious giant shows up to end the party. Poppy, the optimistic leader of the Trolls, and her polar opposite, Branch, must embark on an adventure that takes them far beyond the only world they’ve ever known.',
            'image'      =>'upload/Imgs/1663121750trolls.jpg',
            'video'   =>'xyjm5VQ11TQ',
            'from'       =>'2020-07-11',
            'to'         =>'2020-07-15',
            'type'       => '2D',
            'hall_id'    => 1,
        ]); 

        Movie::create([
            'name'       =>'The Smurfs',
            'description'=>'When the evil wizard Gargamel chases the tiny blue Smurfs out of their village, they tumble from their magical world and into ours -- in fact, smack dab in the middle of Central Park. Just three apples high and stuck in the Big Apple, the Smurfs must find a way to get back to their village before Gargamel tracks them down.',
            'image'      =>'upload/Imgs/1663121658The Smurfs.jpg',
            'video'   =>'KLkBsu67wuk',
            'from'       =>'2020-07-11',
            'to'         =>'2020-07-15',
            'type'       => '2D',
            'hall_id'    => 1,
        ]);
         
        Movie::create([
            'name'       =>'Tom & Jerry',
            'description'=>'Tom the cat and Jerry the mouse get kicked out of their home and relocate to a fancy New York hotel, where a scrappy employee named Kayla will lose her job if she can’t evict Jerry before a high-class wedding at the hotel. Her solution? Hiring Tom to get rid of the pesky mouse.',
            'image'      =>'upload/Imgs/1663121819tom.jpg',
            'video'   =>'tbhk0-MEWIo',
            'from'       =>'2020-07-11',
            'to'         =>'2020-07-15',
            'type'       => '3D',
            'hall_id'    => 1,
        ]); 
        Movie::create([
            'name'       =>'beauty and the Beast',
            'description'=>'beauty and the Beast',
            'image'      =>'upload/Imgs/3.jpg',
            'video'      =>'tbhk0-MEWIo',
            'from'       =>'2021-07-11',
            'to'         =>'2021-07-15',
            'type'       => '3D',
            'hall_id'    => 2,
            'showing_type'=>'up coming',
        ]); 
        Movie::create([
            'name'       =>'The Jungle',
            'description'=>'The Jungle',
            'image'      =>'upload/Imgs/2.jpg',
            'video'      =>'tbhk0-MEWIo',
            'from'       =>'2021-07-11',
            'to'         =>'2021-07-15',
            'type'       => '3D',
            'hall_id'    => 2,
            'showing_type'=>'up coming',
        ]); 
    }
}
