<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VillageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ward_id' => rand(1,9),
            'name' => $this->faker->state(),
            'status' => auth()->id(),
        ];
    }
}
