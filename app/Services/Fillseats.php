<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class Fillseats 
{
   public function fillseat($hall_id)
   {

    for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => $hall_id ,
        'code'    => 'A'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => $hall_id ,
        'code'    => 'B'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => $hall_id ,
        'code'    => 'C'.$i ,
        );
       DB::table('seats')->insert($seat);
      }

      for($i=1;$i<=5;$i++)
      {
        $seat     = array (
        'hall_id' => $hall_id ,
        'code'    => 'D'.$i ,
        );
   }
 }
}