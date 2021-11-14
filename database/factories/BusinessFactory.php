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
            'user_id' => $this->faker;
            'father' => $this->faker;
            'mother' => $this->faker;
            'spouse' => $this->faker;
            'nid' => $this->faker;
            'birth_certificate' => $this->faker;
            'mobile' => $this->faker;
            'photo' => $this->faker;
            'road_moholla' => $this->faker;
            'holding_no' => $this->faker;
            'shopno' => $this->faker;
            'business_name' => $this->faker;
            'business_address' => $this->faker;
            'current_address' => $this->faker;
            'permanent_address' => $this->faker;
            'ward_id' => $this->faker;
            'village_id' => $this->faker;
            'business_type_id' => $this->faker;
            'payment_method_id' => $this->faker;
            'trade_fee' => $this->faker;
            'vat' => $this->faker;
            'signboard_tax' => $this->faker;
            'business_tax' => $this->faker;
            'other_tax' => $this->faker;
            'trade_total' => $this->faker;
            'service_charge' => $this->faker;
            'last_license_issue_year' => $this->faker;
            'activated_by' => $this->faker;
            'deactivated_by' => $this->faker;

        ];
    }
}
