<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostOfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'    => 1234,
            'name'    => $this->faker->name(),
            'status'    => auth()->id(),
        ];
    }
}
