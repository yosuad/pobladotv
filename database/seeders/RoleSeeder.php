<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Administrador', 'Editor', 'Autor', 'Colaborador'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $this->command->info('✅ Roles creados correctamente.');
    }
}