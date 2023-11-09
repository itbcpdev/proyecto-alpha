<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultLooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_looks', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 180);
            $table->string('look_id');
            $table->string('tipo_look_id');
            $table->string('estatura_id');
            $table->string('edad_id');
            $table->string('silueta_id');
            $table->string('estilo_id');
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
        Schema::dropIfExists('result_looks');
    }
}
