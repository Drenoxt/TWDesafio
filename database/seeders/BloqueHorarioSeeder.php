<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloqueHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bloque_horarios')->insert([
            ['descripcion' => '08:00:00'],
            ['descripcion' => '09:00:00'],
            ['descripcion' => '10:00:00'],
            ['descripcion' => '11:00:00'],
            ['descripcion' => '12:00:00'],
            ['descripcion' => '13:00:00'],
            ['descripcion' => '14:00:00'],
            ['descripcion' => '15:00:00'],
            ['descripcion' => '16:00:00'],
        ]);        
    }
}
