<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSiluetasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siluetas = [
            [
                'nombre' => 'Silueta 1',
                'imagen_url' => 'silueta-1.png'
            ],
            [
                'nombre' => 'Silueta 2',
                'imagen_url' => 'silueta-2.png'
            ],
            [
                'nombre' => 'Silueta 3',
                'imagen_url' => 'silueta-3.png'
            ],
            [
                'nombre' => 'Silueta 4',
                'imagen_url' => 'silueta-4.png'
            ],
            [
                'nombre' => 'Silueta 5',
                'imagen_url' => 'silueta-5.png'
            ],
            [
                'nombre' => 'Silueta 6',
                'imagen_url' => 'silueta-6.png'
            ]
        ];

        foreach($siluetas as $silueta) {
            DB::table('siluetas')->insert([
                'nombre' => $silueta['nombre'],
                'imagen_url' => $silueta['imagen_url'],
            ]);
        }
    }
}
