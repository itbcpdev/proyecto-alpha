<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('looks', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 180);
            $table->string('imagen_url')->nullable(TRUE);
            $table->string('color_hex_1', 15)->nullable(true);
            $table->string('color_hex_2', 15)->nullable(true);
            $table->string('color_hex_3', 15)->nullable(true);
            $table->string('description_text_1')->nullable(true);
            $table->string('description_text_2')->nullable(true);
            $table->string('description_text_3')->nullable(true);
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
        Schema::dropIfExists('looks');
    }
}
