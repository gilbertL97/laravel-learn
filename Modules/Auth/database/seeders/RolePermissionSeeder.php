<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'update-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'read-users']);
        Permission::create(['name' => 'create-post']);
        Permission::create(['name' => 'delete-post']);
        Permission::create(['name' => 'update-post']);
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'delete-category']);
        Permission::create(['name' => 'create-roles']);
        Permission::create(['name' => 'read-roles']);
        Permission::create(['name' => 'update-roles']);
        Permission::create(['name' => 'delete-roles']);
        // Crear roles
        $adminRole = Role::create(['name' => 'super-admin']);


        // Asignar permisos a roles
        $adminRole->givePermissionTo(Permission::all()); // El super-admin tiene todos los permisos
    }
}
