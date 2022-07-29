<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '1',
        'code'    => 'A'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '1',
        'code'    => 'B'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '1',
        'code'    => 'C'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '1',
        'code'    => 'D'.$i ,
        );
       DB::table('seats')->insert($seat);
      }
      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '2',
        'code'    => 'A'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '2',
        'code'    => 'B'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '2',
        'code'    => 'C'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => '2',
        'code'    => 'D'.$i ,
        );
       DB::table('seats')->insert($seat);
      }
    }
}
