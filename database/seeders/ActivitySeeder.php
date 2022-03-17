<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use BD;
class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'name' => 'Pilates',
            'descripcion' => 'pilates terapeutico',
            'duracion' => 1.5,
            'participantes' => 30
        ]);
    }
}
