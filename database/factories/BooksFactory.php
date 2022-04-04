<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'name'=>$this->faker->name,
          'genres'=> 'Love, Drama, Romance',
          'isbn_id'=>$this->faker->isbn13,
          'description'=>$this->faker->text,
          'rental_price'=>$this->faker->numberBetween(2,5),
          'author'=>$this->faker->name,
          'book_count'=>$this->faker->numberBetween(1,10),
          'book_type'=>$this->faker->boolean,
          'book_cover_img'=>'book'. $this->faker->numberBetween(1,24) .'.jpg',
        ];
    }
}
