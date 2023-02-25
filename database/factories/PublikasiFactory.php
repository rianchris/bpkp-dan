<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublikasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(4, 8)),
            'user_id' => mt_rand(1, 3),
            'publisher' => $this->faker->sentence(mt_rand(2, 4)),
            'slug' => $this->faker->slug(),
            'file' => $this->faker->sentence(),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now')
        ];
    }
}
