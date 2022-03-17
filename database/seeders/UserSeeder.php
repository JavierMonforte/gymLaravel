<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use BD;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'dni' => '25183028Y',
            'name' => 'Javier Monforte Taboada',
            'email' => 'jmonforte@fontecabras.es',
            'peso' => 115,
            'altura' => 1.85,
            'fechaNacimiento' => '1977-07-24',
            'sexo' => 'Masculino',
            'password' => Hash::make('secret'),
            'role_id' => 3
        ]);   
        User::create([
            'dni' => '23435897R',
            'name' => 'Pablo Gracia',
            'email' => 'jmonforte@fuentesana.es',
            'peso' => 115,
            'altura' => 1.85,
            'fechaNacimiento' => '2000-07-24',
            'sexo' => 'Masculino',
            'password' => Hash::make('secret'),
            'role_id' => 1
        ]);   }
}
