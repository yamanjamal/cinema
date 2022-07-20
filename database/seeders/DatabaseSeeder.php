<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            HallSeeder::class,
            MovieSeeder::class,
            SeatSeeder::class,
            PriceSeeder::class,
            TicketSeeder::class,
            StarttimeSeeder::class,
            GenreSeeder::class,
            SnackSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
