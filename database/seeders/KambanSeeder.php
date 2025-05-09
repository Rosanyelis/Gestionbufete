<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Kamban;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KambanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kamban = Kamban::create([
            'user_id' => 2,
            'title' => 'Gestiones Administrador',
            'description' => 'panel de gestion del administrador',
            'status' => 'Activo'
        ]);

        Board::create(['kamban_id' => $kamban->id,'title' => 'Gestiones o Tareas', 'title_slug' => 'gestiones_o_tareas']);
        Board::create(['kamban_id' => $kamban->id,'title' => 'Pendientes', 'title_slug' => 'pendientes']);
        Board::create(['kamban_id' => $kamban->id,'title' => 'En Proceso', 'title_slug' => 'en_proceso']);
        Board::create(['kamban_id' => $kamban->id,'title' => 'En Revision', 'title_slug' => 'en_revision']);
        Board::create(['kamban_id' => $kamban->id,'title' => 'Finalizadas', 'title_slug' => 'finalizadas']);
    }
}
