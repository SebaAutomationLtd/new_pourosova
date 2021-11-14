<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VillageSeeder::class);
        $this->call(BosotBariHoldingSeeder::class);
        $this->call(PostOfficeSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(BusinessHoldingSeeder::class);
    }
}
