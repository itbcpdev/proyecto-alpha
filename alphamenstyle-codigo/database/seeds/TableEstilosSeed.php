<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableEstilosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estilos = [
            [
                'nombre' => 'Estilo 1',
                'imagen_url' => 'estilo-sofisticado.jpg',
                'titulo' => 'Sofisticado',
                'subtitulo' => 'Elegante, Sobrio, de mucho mundo.'
            ],
            [
                'nombre' => 'Estilo 2',
                'imagen_url' => 'estilo-trendy.jpg',
                'titulo' => 'Trendy',
                'subtitulo' => 'Siempre actualizado, Creativo, Audaz.'
            ],
            [
                'nombre' => 'Estilo 3',
                'imagen_url' => 'estilo-reservado.jpg',
                'titulo' => 'Reservado',
                'subtitulo' => 'Tradicional, Discreto, Confiable.'
            ],
            [
                'nombre' => 'Estilo 4',
                'imagen_url' => 'estilo-natural.jpg',
                'titulo' => 'Natural',
                'subtitulo' => 'Tranquilo, Práctico, Empático.'
            ],
            [
                'nombre' => 'Estilo 5',
                'imagen_url' => 'estilo-poderoso.jpg',
                'titulo' => 'Poderoso',
                'subtitulo' => 'Muy seguro, Imponente, de Alto nivel.'
            ],
            [
                'nombre' => 'Estilo 6',
                'imagen_url' => 'estilo-seductor.jpg',
                'titulo' => 'Seductor',
                'subtitulo' => 'Súper Fitness, Sexy, llama la atención.'
            ]
        ];

        foreach($estilos as $estilo) {
            DB::table('estilos')->insert([
                'nombre' => $estilo['nombre'],
                'imagen_url' => $estilo['imagen_url'],
                'titulo' => $estilo['titulo'],
                'subtitulo' => $estilo['subtitulo'],
            ]);
        }
    }
}
