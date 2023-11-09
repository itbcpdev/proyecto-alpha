<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TableUsuariosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'nombre' => 'Admin',
                'correo' => 'admin@alpha.com',
                'uuid'   => Str::uuid(),
                'password' => '$2a$10$LU5A13chQ0dUXbN0kYUYG.9jD72MPAMf2W6AyIwsltodxUdY1cQxS'
            ],
            [
                'nombre' => 'David',
                'correo' => 'davidsrojasll@gmail.com',
                'uuid'   => Str::uuid(),
                'password' => '$2a$10$LU5A13chQ0dUXbN0kYUYG.9jD72MPAMf2W6AyIwsltodxUdY1cQxS'
            ],
        ];

        foreach ($usuarios as $usuario) {
            DB::table('usuarios')->insert([
                'nombre' => $usuario['nombre'],
                'correo' => $usuario['correo'],
                'uuid' => $usuario['uuid'],
                'password' => $usuario['password'],
            ]);
        }
    }
}
