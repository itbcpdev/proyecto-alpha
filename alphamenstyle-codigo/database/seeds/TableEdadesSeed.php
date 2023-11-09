<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableEdadesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edades = [
            [
                'nombre' => '25 - 35'
            ],
            [
                'nombre' => '35 - 45'
            ],
            [
                'nombre' => '45 - 55'
            ],
        ];

        foreach($edades as $edad) {
            DB::table('edades')->insert([
                'nombre' => $edad['nombre']
            ]);
        }
    }
}
