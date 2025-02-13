<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;
use Spatie\Permission\Models\Role;

class SeedDefaultAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el rol "admin" si no existe
        $adminRole = Role::firstOrCreate(['name' => 'super-admin']);

        // Crear o actualizar el usuario administrador
        $user = User::updateOrCreate(
            ['name'     => 'admin'], // Condición para buscar
            [
                'email' => 'admin2@example.org',
                'password' => bcrypt('123456'),
            ]
        );

        // Asignar el rol "admin" al usuario (si no lo tiene)
        if (!$user->hasRole('super-admin')) {
            $user->assignRole($adminRole);
        }
    }
}
