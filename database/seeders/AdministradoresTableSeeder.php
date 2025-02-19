<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministradoresTableSeeder extends Seeder
{
    public function run()
    {
        Administrador::truncate();
        $users = User::all();
        
        foreach ($users as $user) {
            $numAdmin = rand(1, 2);

            if ($numAdmin > 0) {
                $adminAleatorioId = $users->random($numAdmin);
            }
        }
    }
}