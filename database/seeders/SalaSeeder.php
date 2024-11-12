<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sala;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salas = [
            ['nombre' => 'Sala A', 'descripcion' => 'Sala para reuniones pequeñas'],
            ['nombre' => 'Sala B', 'descripcion' => 'Sala para presentaciones y conferencias'],
            ['nombre' => 'Sala C', 'descripcion' => 'Sala para trabajo colaborativo'],
            ['nombre' => 'Sala D', 'descripcion' => 'Sala privada para videoconferencias'],
            ['nombre' => 'Sala E', 'descripcion' => 'Sala equipada para formación y capacitaciones'],
        ];

        foreach ($salas as $sala) {
            Sala::create($sala);
        }
    }
}
