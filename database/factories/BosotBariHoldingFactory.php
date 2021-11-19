<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BosotBariHoldingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,100),
            'father' => $this->faker->name(),
            'mother' => $this->faker->name(),
            'spouse' => $this->faker->name(),
            'gender' => rand(1,3),
            'marital_status' => rand(1,3),
            'dob' => $this->faker->dateTime(),
            'nid' => 534534534545,
            'birth_certificate' => $this->faker->name(),
            'religion' => $this->faker->name(),
            'photo' => $this->faker->image('public/storage/images',400,300),
            'family_class_id' => rand(1,3),
            'ward_id' => rand(1,9),
            'village_id' => rand(1,100),
            'post_office_id' => rand(1,10),
            'house_type_id' => rand(1,3),
            'occupation_id' => rand(1,10),
            'payment_method_id' => rand(1,10),
            'sanitation_id' => rand(1,10),
            'holding_no' => 567,
            'total_room' => 6,
            'height' => 34,
            'width' => 34,
            'total_male' => 2,
            'total_female' => 2,
            'monthly_income' => 10000,
            'yearly_value' => 232,
            'yearly_vat' => 220,
            'service_charge' => 120,
            'last_tax_year' => $this->faker->dateTime(),
            'activated_by' => auth()->id(),
            'deactivated_by' => auth()->id(),
            'biddut' => auth()->id(),
            'status' => auth()->id(),

        ];
    }
}
