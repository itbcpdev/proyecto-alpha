<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TablePerfilesSeed::class);
        $this->call(TableUsuariosSeed::class);
        $this->call(TablePerfilUsuariosSeed::class);
        $this->call(TableGaleriaHomeSeed::class);
        $this->call(TableTipoLookGuardadoSeed::class);
        $this->call(TableTipoLooksSeed::class);
        $this->call(TableEstaturasSeed::class);
        $this->call(TableEdadesSeed::class);
        $this->call(TableSiluetasSeed::class);
        $this->call(TableEstilosSeed::class);
        $this->call(TableLooksSeed::class);
        $this->call(TableGestionarPasarelaSeed::class);
        $this->call(TableLooksOcultos::class);
        $this->call(TableGuardarropaSeed::class);
        $this->call(TableResultadoLookSeed::class);
        $this->call(TableResultadoGuardarropaSeed::class);
        $this->call(TableRedSocialSeed::class);
    }
}
