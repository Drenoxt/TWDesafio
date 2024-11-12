<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'adminTW', 'email' => 'adminTW@example.com', 'password' => Hash::make('123'), 'rol_id' => 1],
            ['name' => 'clienteTW', 'email' => 'clienteTW@example.com', 'password' => Hash::make('123'), 'rol_id' => 2],
        ]); 
    }
}
