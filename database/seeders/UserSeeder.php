<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@estatehub.com'],
            [
                'nom_complet' => 'Admin EstateHub',
                'tel' => '0600000001',
                'ville' => 'Casablanca',
                'role' => 'admin',
                'password' => Hash::make('admin'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'agent@estatehub.com'],
            [
                'nom_complet' => 'Agent EstateHub',
                'tel' => '0600000002',
                'ville' => 'Rabat',
                'role' => 'agent',
                'password' => Hash::make('Agent@12345'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'client@estatehub.com'],
            [
                'nom_complet' => 'Client EstateHub',
                'tel' => '0600000003',
                'ville' => 'Fes',
                'role' => 'client',
                'password' => Hash::make('Client@12345'),
            ]
        );
    }
}
