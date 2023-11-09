<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioLooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_looks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')
                ->references('id')
                ->on('usuarios');
            $table->string('look_id_o_guardarropa_id');
            $table->foreignId('tipo_look_guardado_id')
                ->references('id')
                ->on('tipo_look_guardado');
            $table->string('texto_look')->nullable();
            $table->boolean('activo')->default(TRUE);
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
        Schema::dropIfExists('usuario_looks');
    }
}
