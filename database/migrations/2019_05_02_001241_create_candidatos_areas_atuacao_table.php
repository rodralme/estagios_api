<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosAreasAtuacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos_areas_atuacao', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedInteger('area_atuacao_id');

            $table->foreign('candidato_id')->references('id')->on('candidatos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('area_atuacao_id')->references('id')->on('areas_atuacao')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['candidato_id', 'area_atuacao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos_areas_atuacao');
    }
}
