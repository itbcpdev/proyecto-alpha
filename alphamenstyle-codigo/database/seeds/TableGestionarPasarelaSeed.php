<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableGestionarPasarelaSeed extends Seeder
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
                'activa' => 1
            ],
        ];

        foreach($pefiles as $perfil) {
            DB::table('gestion_pasarela_pagos')->insert([
                'activa' => $perfil['activa']
            ]);
        }
    }
}
