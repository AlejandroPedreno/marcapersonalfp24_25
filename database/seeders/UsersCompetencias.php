<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersCompetenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usersCompetencias')->truncate();

        foreach ($users as $user) {
            foreach($competencias as $competencia){
                foreach($actividades as $actividad){
                DB::table('usersCompetencias')->insert([
                    'user_id' => $user->id,
                    'competencia_id' => $competencia->id,
                    'docente_validador' => $actividad->docente_id
                ]);
            }
        }
    }

}
}
