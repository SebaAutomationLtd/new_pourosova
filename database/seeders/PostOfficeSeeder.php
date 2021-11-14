<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         PostOffice::factory()->count(100)->create();
    }
}
