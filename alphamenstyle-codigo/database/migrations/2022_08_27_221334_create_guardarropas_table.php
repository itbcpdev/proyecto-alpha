<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardarropasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardarropas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 180);
            $table->string('imagen_url')->nullable(TRUE);
            $table->string('link')->nullable(true);
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
        Schema::dropIfExists('guardarropas');
    }
}
