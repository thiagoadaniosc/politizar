<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sigla');
            $table->string('idSenado');
            $table->string('idCamara');
            $table->string('presidente');
            $table->integer('numero_legenda')->default(0);
            $table->string('descricao');
            $table->string('espectro_politico');
            $table->string('ideologia');
            $table->integer('numero_deputados');
            $table->integer('numero_senadores');
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
        Schema::dropIfExists('partidos');
    }
}
