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
            'user_id'   => rand(1,100),
            'father'    => $this->faker->name(),
            'mother'    => $this->faker->name(),
            'spouse'    => $this->faker->name(),
            'nid'       => 534534534545,
            'birth_certificate' => $this->faker->name(),
            'mobile'    => $this->faker->phoneNumber(),
            'photo'     => $this->faker->image(public_path('upload/bunisess')),
            'road_moholla' => 5,
            'holding_no'   => 568,
            'shopno'       => $this->faker->name(),
            'business_name' => $this->faker->name(),
            'business_address' => $this->faker->addess(),
            'current_address'  => $this->faker->addess(),
            'permanent_address' => $this->faker->addess(),
            'ward_id'           => rand(1,9),
            'village_id'        => rand(1,100),
            'business_type_id'  => rand(1,3),
            'payment_method_id' => rand(1,10),
            'trade_fee'         => 250,
            'vat'               => 200,
            'signboard_tax'     => 180,
            'business_tax'      => 300,
            'other_tax'         =>150,
            'trade_total'       => 200,
            'service_charge'    =>120,
            'last_license_issue_year' =>$this->faker->dateTime(),
            'activated_by'      =>1,
            'deactivated_by'    =>1,

        ];
    }
}

