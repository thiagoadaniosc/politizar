<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVereadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vereadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeCivil');
            $table->string('nomeParlamentar');
            $table->string('sexo');
            $table->string('dataNascimento');
            $table->string('telefone');
            $table->string('email');
            $table->string('escolaridade');
            $table->string('salario');
            $table->string('siglaEstado');
            $table->string('siglaPartido');
            $table->string('municipio');
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
        Schema::dropIfExists('vereadores');
    }
}
