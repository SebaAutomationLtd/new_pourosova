<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessHoldingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'father'=>$this->faker->name(),
            'mother'=>$this->faker->name(),
            'spouse'=>$this->faker->name(),
            'dob' => $this->faker->date,
            'nid' => $this->faker->creditCardNumber,
            'birth_certificate' => $this->faker->creditCardNumber,
            'holding_no' => $this->faker->buildingNumber,
            'total_room' => $this->faker->numberBetween(2, 10),
            'height' => $this->faker->numberBetween(20, 30),
            'width' => $this->faker->numberBetween(20, 50),
            'total_male' => $this->faker->numberBetween(1, 5),
            'total_female' => $this->faker->numberBetween(1, 5),
            'monthly_income' => $this->faker->numberBetween(10000, 50000),
            'yearly_value' => $this->faker->numberBetween(100000, 1000000),
            'yearly_vat' => $this->faker->numberBetween(1000, 10000),
            'service_charge' => $this->faker->numberBetween(500, 5000),
            'last_tax_year' => $this->faker->year,
            'biddut' => $this->faker->boolean,
        ];
    }
}
