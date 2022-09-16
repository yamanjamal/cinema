<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'name'=>$this->faker->title(),
            'date'=>'2021-07-12',
            'starttime'=>'3:00',
            'seat_id'=>rand(1,3),
            'movie_id'=>'1',
            'user_id'=>'5',
            'price_id'=>1,
        ];
    }
}
