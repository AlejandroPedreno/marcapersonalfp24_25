<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyectosCiclosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proyectos_ciclos')->truncate();
        // Asignar proyectos a ciclos
        $ciclos = DB::table('ciclos')->get();
        $proyectos = DB::table('proyectos')->get();

        foreach ($ciclos as $ciclo) {
            $numero = rand(0, 2);
            for ($i = 0; $i < $numero; $i++) {
                $proyecto = $proyectos->random();
                DB::table('proyectos_ciclos')->insert([
                    'ciclo_id' => $ciclo->id,
                    'proyecto_id' => $proyecto->id,
                ]);
            }
        }

        $this->command->info('¡Tabla proyectos_ciclos inicializada con datos!');
    }
}
