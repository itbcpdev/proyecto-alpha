<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableResultadoLookSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resultado_looks = [
            [
                'nombre' => 'Resultado Look 1',
                'look_id' => '1',
                'tipo_look_id' => '1',
                'estatura_id' => '1',
                'edad_id' => '1',
                'silueta_id' => '1',
                'estilo_id' => '1'
            ],
            [
                'nombre' => 'Resultado Look 2',
                'look_id' => '2',
                'tipo_look_id' => '1',
                'estatura_id' => '1',
                'edad_id' => '1',
                'silueta_id' => '1',
                'estilo_id' => '1'
            ],
            [
                'nombre' => 'Resultado Look 3',
                'look_id' => '3',
                'tipo_look_id' => '1',
                'estatura_id' => '1',
                'edad_id' => '1',
                'silueta_id' => '1',
                'estilo_id' => '1'
            ],
            [
                'nombre' => 'Resultado Look 4',
                'look_id' => '4',
                'tipo_look_id' => '1',
                'estatura_id' => '1',
                'edad_id' => '1',
                'silueta_id' => '1',
                'estilo_id' => '1'
            ],
            [
                'nombre' => 'Resultado Look 5',
                'look_id' => '5',
                'tipo_look_id' => '1',
                'estatura_id' => '1',
                'edad_id' => '1',
                'silueta_id' => '1',
                'estilo_id' => '1'
            ],
        ];

        foreach($resultado_looks as $resultado_look) {
            DB::table('result_looks')->insert([
                'nombre' => $resultado_look['nombre'],
                'look_id' => $resultado_look['look_id'],
                'tipo_look_id' => $resultado_look['tipo_look_id'],
                'estatura_id' => $resultado_look['estatura_id'],
                'edad_id' => $resultado_look['edad_id'],
                'silueta_id' => $resultado_look['silueta_id'],
                'estilo_id' => $resultado_look['estilo_id']
            ]);
        }
    }
}
