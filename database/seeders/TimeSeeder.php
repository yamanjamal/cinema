<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Time::create([
            'starttime'=>'3:00',
            'endtime'=>'5:00',
        ]);

        Time::create([
            'starttime'=>'5:30',
            'endtime'=>'7:30',
        ]);

        Time::create([
            'starttime'=>'8:00',
            'endtime'=>'10:00',
        ]);

         Time::create([
            'starttime'=>'10:15',
            'endtime'=>'12:15',
        ]);
    }
}
