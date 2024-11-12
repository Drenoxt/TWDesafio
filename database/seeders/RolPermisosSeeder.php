<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('roles')->where('nombre', 'Administrador')->value('id');
        $clientRoleId = DB::table('roles')->where('nombre', 'Cliente')->value('id');

        $permissions = DB::table('permisos')->pluck('id', 'nombre');

        $adminPermissions = [
            'crear_sala',
            'editar_sala',
            'eliminar_sala',
            'ver_reservas',
            'cambiar_estado_reservas',
        ];

        $clientPermissions = [
            'hacer_reserva',
            'listar_reservas',
        ];

        foreach ($adminPermissions as $permiso) {
            DB::table('rol_permisos')->insert([
                'rol_id' => $adminRoleId,
                'permiso_id' => $permissions[$permiso],
            ]);
        }

        foreach ($clientPermissions as $permiso) {
            DB::table('rol_permisos')->insert([
                'rol_id' => $clientRoleId,
                'permiso_id' => $permissions[$permiso],
            ]);
        }
    }
}
