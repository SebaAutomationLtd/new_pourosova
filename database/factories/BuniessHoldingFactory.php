<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuniessHoldingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> rand(1,100),
            'father'=>$this->faker->name(),
            'mother'=>$this->faker->name(),
            'spouse'=>$this->faker->name(),
            'gender'=>rand(1,3),
            'marital_status'=>rand(1,3),,
            'dob'=>$this->faker->dateTime(),
            'nid'=>534534534545,
            'birth_certificate'=>$this->faker->name(),
            'religion'=>$this->faker->name(),
            'photo'=>$this->faker->image(public_path('uploads/buniessholding')),
            'family_class_id'=>rand(1,3),
            'ward_id'=>rand(1,9),
            'village_id'=>rand(1,100),
            'post_office_id'=>rand(1,10),
            'house_type_id' => rand(1,3),
            'occupation_id' => rand(1,10),
            'payment_method_id' => rand(1,10),
            'sanitation_id'=> rand(1,10),
            'holding_no'=>5475,
            'total_room'=>5,
            'height'=>34,
            'width'=>34,
            'total_male'=>2,
            'total_female'=>2,
            'monthly_income'=>2500,
            'yearly_value'=>232,
            'yearly_vat'=>100,
            'service_charge'=>50,
            'last_tax_year'=>$this->faker->dateTime(),
            'activated_by'=>1,
            'deactivated_by'=>1,
            'activated_at'=>1,
            'deactivated_at'=>1,
            'biddut'=>1,
            'status'=>1,
        ];
    }
}