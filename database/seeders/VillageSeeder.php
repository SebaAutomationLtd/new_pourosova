<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Village;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::factory()
            ->count(100)
            ->state(new Sequence(
                fn($sequence) => ['ward_id' => Ward::all()->random()],
            ))
            ->create();
    }
}
