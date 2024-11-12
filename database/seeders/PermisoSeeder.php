<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permisos')->insert([
            ['nombre' => 'crear_sala', 'descripcion' => 'Permite al usuario crear una nueva sala de coworking'],
            ['nombre' => 'editar_sala', 'descripcion' => 'Permite al usuario editar una sala existente'],
            ['nombre' => 'eliminar_sala', 'descripcion' => 'Permite al usuario eliminar una sala de coworking'],
            ['nombre' => 'ver_reservas', 'descripcion' => 'Permite al usuario ver las reservas de una sala'],
            ['nombre' => 'cambiar_estado_reservas', 'descripcion' => 'Permite al usuario cambiar el estado de una reserva'],
            ['nombre' => 'hacer_reserva', 'descripcion' => 'Permite al usuario hacer una reserva en una sala'],
            ['nombre' => 'listar_reservas', 'descripcion' => 'Permite al usuario listar las reservas que ha realizado'],
        ]);        
    }
}
