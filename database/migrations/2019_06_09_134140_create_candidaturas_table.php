<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('vaga_id');

            $table->dateTime('data');

            $table->foreign('usuario_id')->references('id')->on('usuarios')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vaga_id')->references('id')->on('vagas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['usuario_id', 'vaga_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidaturas');
    }
}
