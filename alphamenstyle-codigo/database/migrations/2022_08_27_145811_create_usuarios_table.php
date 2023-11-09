<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('nombre', 150);
            $table->string('correo', 180);
            $table->string('password');
            $table->string('profesion')->nullable();
            $table->string('last_work')->nullable();
            $table->string('company')->nullable();
            $table->string('favorite_social_locations')->nullable();
            $table->string('club_social')->nullable();
            $table->string('celular_number')->nullable();
            $table->string('rrss')->nullable();
            $table->string('ubication')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('update_profile')->default(0);
            $table->integer('terminos')->default(0);
            $table->integer('politica_privacidad')->default(0);
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
        Schema::dropIfExists('usuarios');
    }
}
