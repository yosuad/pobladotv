<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'soporte@wiquiweb.com'],
            [
                'name'     => 'Jose Luis',
                'password' => Hash::make('~mSs=)@DwV"tQ;z*2w'),
            ]
        );
        $admin->assignRole('Administrador');

        $this->command->info('✅ Usuario administrador creado correctamente.');
    }
}