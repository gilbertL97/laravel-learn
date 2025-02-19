<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SeedDeletAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nombre del rol que deseas eliminar
        $roleName = 'old-role';

        // Buscar el rol por su nombre
        $role = Role::where('name', $roleName)->first();

        // Si el rol existe, eliminarlo
        if ($role) {
            $role->delete();
        }

        // Crear un nuevo rol después de eliminar el antiguo
        Role::create(['name' => 'new-role']);
    }
}
