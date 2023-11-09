<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableGuardarropaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guardarropas = [
            [
                'nombre' => 'Black T-shirt',
                'imagen_url' => 'black-t-shirt.jpg',
                'link' => 'https://www.oechsle.pe/polo-hypnotic-tsmc-bolsillorec-hombre-2047746/p?color=Beige'
            ],
            [
                'nombre' => 'Blue Jeans',
                'imagen_url' => 'blue-jeans.jpg',
                'link' => 'https://www.oechsle.pe/polo-hypnotic-tsmc-bolsillorec-hombre-2047746/p?color=Beige'
            ],
            [
                'nombre' => 'Camisa Blanca',
                'imagen_url' => 'camisa-blanca.jpg',
                'link' => 'https://www.oechsle.pe/polo-hypnotic-tsmc-bolsillorec-hombre-2047746/p?color=Beige'
            ],
            [
                'nombre' => 'Khaki Chinos',
                'imagen_url' => 'khaki-chinos.jpg',
                'link' => 'https://www.oechsle.pe/polo-hypnotic-tsmc-bolsillorec-hombre-2047746/p?color=Beige'
            ],
            [
                'nombre' => 'Navy Jeans',
                'imagen_url' => 'navy-jeans.jpg',
                'link' => 'https://www.oechsle.pe/polo-hypnotic-tsmc-bolsillorec-hombre-2047746/p?color=Beige'
            ],
            [
                'nombre' => 'White T-shirt',
                'imagen_url' => 'white-t-shirt.jpg',
                'link' => 'https://www.oechsle.pe/polo-hypnotic-tsmc-bolsillorec-hombre-2047746/p?color=Beige'
            ],
        ];

        foreach($guardarropas as $guardarropa) {
            DB::table('guardarropas')->insert([
                'nombre' => $guardarropa['nombre'],
                'imagen_url' => $guardarropa['imagen_url'],
                'link' => $guardarropa['link'],
            ]);
        }
    }
}
