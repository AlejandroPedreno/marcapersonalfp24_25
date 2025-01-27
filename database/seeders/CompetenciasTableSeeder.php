<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('competencias')->truncate();

        foreach (self::$competencias as $competencias) {
            DB::table('competencias')->insert([
                'nombre' => $competencias['nombre'],
                'color' => $competencias['color']

            ]);
        }
        $this->command->info('¡Tabla ciclos inicializada con datos!');
    }
    private static $competencias = array(
        array('nombre' => 'Técnico en Actividades Ecuestres', 'color' => '#FF0000'),
        array('nombre' => 'Técnico Superior en Acondicionamiento Físico', 'color' => '#FF0000'),
        array('nombre' => 'Profesional Básico en Acceso y Conservación en Instalaciones Deportivas' , 'color' => '#FF0000'),
        array('nombre' => 'Técnico Superior en Enseñanza y Animación Sociodeportiva' , 'color' => '#FF0000'),
        array('nombre' => 'Técnico en Guía en el Medio Natural y de Tiempo Libre' , 'color' => '#FF0000'),
        array('nombre' => 'Técnico Superior en Administración y Finanzas' , 'color' => '#FF0000'),
        array('nombre' => 'Técnico en Fabricación de Productos Cerámicos'   , 'color' => '#FF0000'),
        array('nombre' => 'Profesional Básico en Vidriería y Alfarería'  , 'color' => '#FF0000'),
      );
}
