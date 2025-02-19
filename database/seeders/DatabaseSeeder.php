<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Auth\Database\Seeders\RolePermissionSeeder;
use Modules\Auth\Database\Seeders\SeedDefaultAdminUserSeeder;
use Modules\Auth\Database\Seeders\SeedDeletAdminRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolePermissionSeeder::class,
            SeedDefaultAdminUserSeeder::class,
            SeedDeletAdminRoleSeeder::class,

        ]);
    }
}
