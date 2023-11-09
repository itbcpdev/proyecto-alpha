<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoSelectedByUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_selected_by_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')
                ->references('id')
                ->on('usuarios');
            $table->foreignId('tipo_look_id')
                ->references('id')
                ->on('tipo_looks');
            $table->foreignId('estatura_id')
                ->references('id')
                ->on('estaturas');
            $table->foreignId('edad_id')
                ->references('id')
                ->on('edades');
            $table->foreignId('silueta_id')
                ->references('id')
                ->on('siluetas');
            $table->foreignId('estilo_id')
                ->references('id')
                ->on('estilos');
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
        Schema::dropIfExists('info_selected_by_user');
    }
}
