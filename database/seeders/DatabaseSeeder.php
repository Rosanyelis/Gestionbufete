<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            JuzgadoSeeder::class,
            MateriaSeeder::class,
            MedioContactoSeeder::class,
        ]);

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
