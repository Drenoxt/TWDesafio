<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_reservas')->insert([
            ['nombre' => 'Pendiente'],
            ['nombre' => 'Aceptada'],
            ['nombre' => 'Rechazada'],
        ]);        
    }
}
