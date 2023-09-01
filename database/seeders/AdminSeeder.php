<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name' => 'Super-Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' //password
        ])->syncRoles(['Super_Admin']);
    }

    public function givPermission()
    {
        $admin = Admin::find(1);
        $Permissions = Permission::all();
        $allPermission = [];
        foreach ($Permissions as $Permission) {
            array_push($allPermission, $Permission->name);
        }
        $admin->givePermissionTo($allPermission);
    }
}
