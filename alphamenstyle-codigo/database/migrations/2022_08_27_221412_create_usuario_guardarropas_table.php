<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioGuardarropasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_guardarropas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')
                ->references('id')
                ->on('usuarios');
            $table->foreignId('guardarropas_id')
                ->references('id')
                ->on('guardarropas');
            $table->boolean('flestado')->default(TRUE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_guardarropas');
    }
}
