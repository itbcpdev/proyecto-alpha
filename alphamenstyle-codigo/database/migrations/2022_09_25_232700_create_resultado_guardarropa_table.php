<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadoGuardarropaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_guardarropa', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('prendas_seleccionadas_id');
            $table->string('url_imagen');
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
        Schema::dropIfExists('resultado_guardarropa');
    }
}
