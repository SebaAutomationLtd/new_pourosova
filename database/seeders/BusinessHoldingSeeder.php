<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusinessHoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           BusinessHolding::factory()->count(500)->create();
    }
}
