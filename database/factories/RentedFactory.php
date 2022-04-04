<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rented>
 */
class RentedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,10),
            'books_id'=>$this->faker->numberBetween(1,30),
            'rented_date'=>$this->faker->dateTimeBetween('-2 weeks', '-1 weeks'),
            'rented_price'=>2,
        ];
    }
}
