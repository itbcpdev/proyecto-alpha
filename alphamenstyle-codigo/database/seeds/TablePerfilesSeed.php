<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablePerfilesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pefiles = [
            [
                'nombre' => 'Administrador'
            ],
            [
                'nombre' => 'Customer'
            ],
        ];

        foreach($pefiles as $perfil) {
            DB::table('perfiles')->insert([
                'nombre' => $perfil['nombre']
            ]);
        }
    }
}
