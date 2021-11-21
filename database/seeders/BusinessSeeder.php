<?php

namespace Database\Seeders;

use App\Models\BusinessType;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::factory()
            ->count(500)
            ->state(new Sequence(
                fn($sequence) => [
                    'user_id' => User::all()->random(),
                    'ward_id' => Ward::all()->random(),
                    'business_type_id' => BusinessType::all()->random(),
                    'payment_method_id' => PaymentMethod::all()->random(),
                ],
            ))
            ->create();
    }
}
