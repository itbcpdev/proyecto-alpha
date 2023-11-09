<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetasSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquetas_seo', function (Blueprint $table) {
            $table->id();
            $table->string('meta_type')->default('website');
            $table->string('meta_titulo');
            $table->string('meta_descripcion');
            $table->string('meta_imagen');
            $table->string('meta_url');
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
        Schema::dropIfExists('etiquetas_seo');
    }
}
