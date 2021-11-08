<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(1,3),
            'uniqid'=> uniqid(),
            'desc'=> $this->faker->paragraph(8,12),
            'price'=> $this->faker->randomNumber(5, true),
            'category_id'=> rand(1,5),
        ];
    }
}
