<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dev = User::create([
            'name' => 'Desarrolladora',
            'email' => 'rosanyelismendoza@gmail.com',
            'password' => Hash::make('admin'), // password
        ]);
        $dev->assignRole('Desarrollador');

        $administrador = User::create([
            'name' => 'Administrador',
            'email' => 'administrador@example.com',
            'password' => Hash::make('admin'), // password
        ]);
        $administrador->assignRole('Administrador');
    }
}
