<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Rolessder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $allAdminPer = Permission::where('guard_name', 'admin')->get();
        Role::create(['guard_name' => 'admin', 'name' => 'Super_Admin'])->givePermissionTo($allAdminPer);

    }
}
