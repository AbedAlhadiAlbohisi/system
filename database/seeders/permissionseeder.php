<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Permission::create(['name' => 'Create-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-city', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-cities', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-city', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-city', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-admin', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-admins', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-admin', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-admin', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-User', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Users', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-User', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-User', 'guard_name' => 'admin']);


        Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Permission', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Permission', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Permission', 'guard_name' => 'admin']);
        /*************************************************************************************************** */


        // Permission::create(['name' => 'Create-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'admin']);


        // Permission::create(['name' => 'Create-Note', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Read-Notes', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Update-Note', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Delete-Note', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Create-city', 'guard_name' => 'user-api']);
        // Permission::create(['name' => 'Read-cities', 'guard_name' => 'user-api']);
        // Permission::create(['name' => 'Update-city', 'guard_name' => 'user-api']);
        // Permission::create(['name' => 'Delete-city', 'guard_name' => 'user-api']);

        /******************************************************************************* */

          Permission::create(['name' => 'Create-category', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-categories', 'guard_name' => 'user']);
        Permission::create(['name' => 'Update-category', 'guard_name' => 'user']);
        Permission::create(['name' => 'Delete-category', 'guard_name' => 'user']);




        Permission::create(['name' => 'Create-subcategory', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-subcategories', 'guard_name' => 'user']);
        Permission::create(['name' => 'Update-subcategory', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-subcategory', 'guard_name' => 'admin']);



        Permission::create(['name' => 'Read-categories', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-category', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Read-subcategories', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-subcategory', 'guard_name' => 'user']);
    }
}
