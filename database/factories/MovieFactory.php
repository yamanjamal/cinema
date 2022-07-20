<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->title(),
            'description'=>$this->faker->text(20),
            'from'=>$this->faker->Date(),
            'to'=>$this->faker->Date(),
            'type'=>'2D',
            'hall_id'=>rand(1,10),
        ];
    }
}
