<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'role-management',
            'user-management',
            'active-deactive-panel',
            'bosot-bari-list',
            'bosot-bari-edit',
            'bosot-bari-delete',
            'business-list',
            'business-edit',
            'business-delete',
            'business-hold-list',
            'business-hold-edit',
            'business-hold-delete',
            'common-data-setup',
            'tax-rate-setup',
            'website-settings',
            'trade-license-due',
            'beneficiary-management',
            'reports',
            'certificate-list',
            'certificate-approve',
            'bosot-bari-due',
            'support-admin-management',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
