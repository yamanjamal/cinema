<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Genre::create([
            'name'=>'Action',
        ]);
        Genre::create([
            'name'=>'Horror',
        ]);
        Genre::create([
            'name'=>'Drama',
        ]);
        Genre::create([
            'name'=>'Comedy',
        ]);
        Genre::create([
            'name'=>'Thriller',
        ]);
        Genre::create([
            'name'=>'Science fiction',
        ]);
        Genre::create([
            'name'=>'Romance',
        ]);
        Genre::create([
            'name'=>'Western',
        ]);
        Genre::create([
            'name'=>'Fantasy',
        ]);
        Genre::create([
            'name'=>'Animation',
        ]);
        Genre::create([
            'name'=>'Histirical',
        ]);
        Genre::create([
            'name'=>'Narrative',
        ]);
        Genre::create([
            'name'=>'Adventure',
        ]);
        Genre::create([
            'name'=>'Science',
        ]);
        Genre::create([
            'name'=>'War',
        ]);
        Genre::create([
            'name'=>'Biography',
        ]);
    }
}
