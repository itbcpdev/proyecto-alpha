<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableRedSocialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $redes_sociales = [
            [
                'nombre' => 'Facebook',
            ],
            [
                'nombre' => 'LinkedIn',
            ],
            [
                'nombre' => 'Twitter',
            ],
            [
                'nombre' => 'Instagram',
            ],
            [
                'nombre' => 'WhatsApp',
            ],
            [
                'nombre' => 'TikTok',
            ],
            [
                'nombre' => 'Youtube',
            ],
        ];

        foreach($redes_sociales as $red_social) {
            DB::table('redes_sociales')->insert([
                'nombre' => $red_social['nombre'],
            ]);
        }
    }
}
