<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTipoLookGuardadoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_look_guardado = [
            [
                'nombre' => 'Look',
            ],
            [
                'nombre' => 'Guardarropa',
            ],
        ];

        foreach($tipo_look_guardado as $tipo_guardado) {
            DB::table('tipo_look_guardado')->insert([
                'nombre' => $tipo_guardado['nombre'],
            ]);
        }
    }
}
