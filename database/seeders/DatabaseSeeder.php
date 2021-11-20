<?php

namespace Database\Seeders;

use App\Models\User;
use Devfaysal\BangladeshGeocode\Seeders\DistrictSeeder;
use Devfaysal\BangladeshGeocode\Seeders\DivisionSeeder;
use Devfaysal\BangladeshGeocode\Seeders\UnionSeeder;
use Devfaysal\BangladeshGeocode\Seeders\UpazilaSeeder;
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
        //$this->call(CreateAdminUserSeeder::class);

        //$this->call(DivisionSeeder::class);
        //$this->call(DistrictSeeder::class);
        //$this->call(UpazilaSeeder::class);
        //$this->call(UnionSeeder::class);

        //$this->call(WardSeeder::class);
        //$this->call(VillageSeeder::class);
        //$this->call(PostOfficeSeeder::class);

        //$this->call(UserSeeder::class);
        //$this->call(BosotBariHoldingSeeder::class);
        //$this->call(BusinessSeeder::class);
        $this->call(BusinessHoldingSeeder::class);
    }
}
