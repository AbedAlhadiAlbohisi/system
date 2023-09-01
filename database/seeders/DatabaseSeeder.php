<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CitySeeder::class);
        $this->call(permissionseeder::class);
        $this->call(Rolessder::class);
        $this->call(AdminSeeder::class);
        // Permission::create(['name' => 'Totel_note', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Totel_user', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Totel_admin', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Totel_sike', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Totel_note', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Totel_user', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Totel_admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Totel_sike', 'guard_name' => 'admin']);
    }
}
