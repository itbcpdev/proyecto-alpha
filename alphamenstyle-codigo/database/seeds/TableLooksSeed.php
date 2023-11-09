<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableLooksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $looks = [
            [
                'nombre' => 'Look 1',
                'imagen_url' => 'estilo-natural.jpg',
                'color_hex_1' => 'ffffff',
                'color_hex_2' => 'ff0000',
                'color_hex_3' => 'FE90A6',
                'description_text_1' => 'Descripción 1',
                'description_text_2' => 'Descripción 2',
                'description_text_3' => 'Descripción 3'
            ],
            [
                'nombre' => 'Look 2',
                'imagen_url' => 'estilo-poderoso.jpg',
                'color_hex_1' => 'ffffff',
                'color_hex_2' => 'ff0000',
                'color_hex_3' => 'FE90A6',
                'description_text_1' => 'Descripción 1',
                'description_text_2' => 'Descripción 2',
                'description_text_3' => 'Descripción 3'
            ],
            [
                'nombre' => 'Look 3',
                'imagen_url' => 'estilo-reservado.jpg',
                'color_hex_1' => 'ffffff',
                'color_hex_2' => 'ff0000',
                'color_hex_3' => 'FE90A6',
                'description_text_1' => 'Descripción 1',
                'description_text_2' => 'Descripción 2',
                'description_text_3' => 'Descripción 3'
            ],
            [
                'nombre' => 'Look 4',
                'imagen_url' => 'estilo-seductor.jpg',
                'color_hex_1' => 'ffffff',
                'color_hex_2' => 'ff0000',
                'color_hex_3' => 'FE90A6',
                'description_text_1' => 'Descripción 1',
                'description_text_2' => 'Descripción 2',
                'description_text_3' => 'Descripción 3'
            ],
            [
                'nombre' => 'Look 5',
                'imagen_url' => 'estilo-sofisticado.jpg',
                'color_hex_1' => 'ffffff',
                'color_hex_2' => 'ff0000',
                'color_hex_3' => 'FE90A6',
                'description_text_1' => 'Descripción 1',
                'description_text_2' => 'Descripción 2',
                'description_text_3' => 'Descripción 3'
            ],
        ];

        foreach($looks as $look) {
            DB::table('looks')->insert([
                'nombre' => $look['nombre'],
                'imagen_url' => $look['imagen_url'],
                'color_hex_1' => $look['color_hex_1'],
                'color_hex_2' => $look['color_hex_2'],
                'color_hex_3' => $look['color_hex_3'],
                'description_text_1' => $look['description_text_1'],
                'description_text_2' => $look['description_text_2'],
                'description_text_3' => $look['description_text_3'],
            ]);
        }
    }
}
