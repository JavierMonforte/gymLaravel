<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'registrado'
        ]);
        Role::create([
            'name' => 'usuario'
        ]);
        Role::create([
            'name' => 'administrador'
        ]);
    }
}
