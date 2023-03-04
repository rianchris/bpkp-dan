<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjekFactory extends Factory
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
            'slug' => $this->faker->slug(),
            'member' => $this->faker->sentence(mt_rand(1, 3)),
            'deskripsi' => $this->faker->sentence(mt_rand(5, 6)),
            'partner' => $this->faker->sentence(mt_rand(1, 1)),
            'budget' => mt_rand(1, 10000000),
            'kontak' => $this->faker->sentence(mt_rand(1, 3)),
            'user_id' => mt_rand(1, 5)
        ];
    }
}
