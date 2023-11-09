<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTipoLooksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_looks = [
            [
                'nombre' => 'Ejecutivo',
                'descripcion' => 'Trabajo en oficina corporativa, entrevista laboral, matrimonio civil, reuniones cocktail, celebraciones en restaurantes de mesa vestida, presentaciones especiales, funerales, celebración de un compromiso.'
            ],
            [
                'nombre' => 'Casual',
                'descripcion' => 'Almuerzos familiares en casa por ocasiones especiales, cenas románticas informales, almuerzos campestres de la oficina, reuniones sociales de día, matines, brunch, vernisage.'
            ],
            [
                'nombre' => 'Urbano',
                'descripcion' => 'Reuniones sociales de noche, conciertos, comida rápida con amigos, parrilladas, paseo en yate, ir de shopping, cine, paseo campestre, viaje, caminata.'
            ],
            [
                'nombre' => 'Fiesta',
                'descripcion' => 'Discotecas, fiestas locales, bares, clubs nocturnos, despedidas de soltero.'
            ]
        ];

        foreach($tipo_looks as $tipo_look) {
            DB::table('tipo_looks')->insert([
                'nombre' => $tipo_look['nombre'],
                'descripcion' => $tipo_look['descripcion']
            ]);
        }
    }
}
