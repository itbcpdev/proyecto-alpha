<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablePerfilUsuariosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfil_usuarios = [
            [
                'usuario_id' => '1',
                'perfil_id' => '1',
            ],
            [
                'usuario_id' => '2',
                'perfil_id' => '1',
            ],
        ];

        foreach($perfil_usuarios as $perfil_usuario) {
            DB::table('perfil_usuarios')->insert([
                'usuario_id' => $perfil_usuario['usuario_id'],
                'perfil_id' => $perfil_usuario['perfil_id'],
            ]);
        }
    }
}
