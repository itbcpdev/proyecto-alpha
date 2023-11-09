<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableResultadoGuardarropaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resultado_guardarropas = [
            [
                'nombre' => 'Resultado Guardarropa 1',
                'prendas_seleccionadas_id' => '1',
                'url_imagen' => 'estilo-natural.jpg',
            ],
            [
                'nombre' => 'Resultado Guardarropa 2',
                'prendas_seleccionadas_id' => '1,2',
                'url_imagen' => 'estilo-poderoso.jpg',
            ],
            [
                'nombre' => 'Resultado Guardarropa 3',
                'prendas_seleccionadas_id' => '1,2,3',
                'url_imagen' => 'estilo-reservado.jpg',
            ],
            [
                'nombre' => 'Resultado Guardarropa 4',
                'prendas_seleccionadas_id' => '1,2,3,4',
                'url_imagen' => 'estilo-seductor.jpg',
            ],
            [
                'nombre' => 'Resultado Guardarropa 5',
                'prendas_seleccionadas_id' => '1,2,3,4,5',
                'url_imagen' => 'estilo-sofisticado.jpg',
            ],
        ];

        foreach($resultado_guardarropas as $resultado_guardarropa) {
            DB::table('resultado_guardarropa')->insert([
                'nombre' => $resultado_guardarropa['nombre'],
                'prendas_seleccionadas_id' => $resultado_guardarropa['prendas_seleccionadas_id'],
                'url_imagen' => $resultado_guardarropa['url_imagen'],
            ]);
        }
    }
}
