<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableEstaturasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estaturas = [
            [
                'nombre' => '< 1.60'
            ],
            [
                'nombre' => '1.60 a 1.80'
            ],
            [
                'nombre' => '> 1.80'
            ]
        ];

        foreach($estaturas as $estatura) {
            DB::table('estaturas')->insert([
                'nombre' => $estatura['nombre']
            ]);
        }
    }
}
