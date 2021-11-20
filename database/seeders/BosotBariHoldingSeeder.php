<?php

namespace Database\Seeders;

use App\Models\FamilyClass;
use App\Models\Gender;
use App\Models\HouseType;
use App\Models\MaritalStatus;
use App\Models\Occupation;
use App\Models\PaymentMethod;
use App\Models\PostOffice;
use App\Models\religion;
use App\Models\Sanitation;
use App\Models\User;
use App\Models\Village;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\BosotBariHolding;

class BosotBariHoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BosotBariHolding::factory()
            ->count(500)
            ->state(new Sequence(
                fn($sequence) => [
                    'user_id' => User::all()->random(),
                    'gender' => Gender::all()->random(),
                    'marital_status' => MaritalStatus::all()->random(),
                    'religion' => religion::all()->random(),
                    'family_class_id' => FamilyClass::all()->random(),
                    'ward_id' => Ward::all()->random(),
                    'village_id' => Village::all()->random(),
                    'post_office_id' => PostOffice::all()->random(),
                    'house_type_id' => HouseType::all()->random(),
                    'occupation_id' => Occupation::all()->random(),
                    'payment_method_id' => PaymentMethod::all()->random(),
                    'sanitation_id' => Sanitation::all()->random(),
                ],
            ))
            ->create();
    }
}
