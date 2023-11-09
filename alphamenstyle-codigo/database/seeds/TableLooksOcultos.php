<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableLooksOcultos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $looks_ocultos = [
            [
                'nombre' => 'Look Oculto 1',
                'url_imagen' => 'look-oculto-1.jpg'
            ],
            [
                'nombre' => 'Look Oculto 2',
                'url_imagen' => 'look-oculto-2.jpg'
            ],
            [
                'nombre' => 'Look Oculto 3',
                'url_imagen' => 'look-oculto-3.jpg'
            ],
            [
                'nombre' => 'Look Oculto 4',
                'url_imagen' => 'look-oculto-4.jpg'
            ],
            [
                'nombre' => 'Look Oculto 5',
                'url_imagen' => 'look-oculto-5.jpg'
            ],
            [
                'nombre' => 'Look Oculto 6',
                'url_imagen' => 'look-oculto-6.jpg'
            ],
            [
                'nombre' => 'Look Oculto 7',
                'url_imagen' => 'look-oculto-7.jpg'
            ],
            [
                'nombre' => 'Look Oculto 8',
                'url_imagen' => 'look-oculto-8.jpg'
            ],
            [
                'nombre' => 'Look Oculto 9',
                'url_imagen' => 'look-oculto-9.jpg'
            ],
            [
                'nombre' => 'Look Oculto 10',
                'url_imagen' => 'look-oculto-10.jpg'
            ],
        ];

        foreach($looks_ocultos as $looks_oculto) {
            DB::table('hidden_looks')->insert([
                'nombre' => $looks_oculto['nombre'],
                'url_imagen' => $looks_oculto['url_imagen'],
            ]);
        }
    }
}
