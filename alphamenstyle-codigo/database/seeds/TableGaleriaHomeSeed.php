<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableGaleriaHomeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galeria_home = [
            [
                'nombre' => 'Galeria',
                'imagen_url' => 'galeria-home.png',
            ]
        ];

        foreach($galeria_home as $galeria) {
            DB::table('galeria_home')->insert([
                'nombre' => $galeria['nombre'],
                'imagen_url' => $galeria['imagen_url'],
            ]);
        }
    }
}
