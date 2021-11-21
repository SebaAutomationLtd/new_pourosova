<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'father'    => $this->faker->name(),
            'mother'    => $this->faker->name(),
            'spouse'    => $this->faker->name(),
            'nid' => $this->faker->creditCardNumber,
            'birth_certificate' => $this->faker->creditCardNumber,
            'holding_no' => $this->faker->buildingNumber,
            'mobile'    => $this->faker->phoneNumber(),
            'road_moholla' => $this->faker->streetAddress,
            'business_name' => $this->faker->company(),
            'business_address' => $this->faker->address(),
            'current_address'  => $this->faker->address(),
            'permanent_address' => $this->faker->address(),
            'trade_fee'         => $this->faker->numberBetween(5000, 50000),
            'vat'               => $this->faker->numberBetween(5000, 50000),
            'signboard_tax'     => $this->faker->numberBetween(1000, 5000),
            'business_tax'      => $this->faker->numberBetween(5000, 50000),
            'other_tax'         => $this->faker->numberBetween(1000, 5000),
            'trade_total'       => $this->faker->numberBetween(5000, 50000),
            'service_charge'    => $this->faker->numberBetween(1000, 5000),
            'last_license_issue_year' =>$this->faker->year,
        ];
    }
}

