<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasAreasAtuacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas_areas_atuacao', function (Blueprint $table) {
            $table->unsignedBigInteger('vaga_id');
            $table->unsignedInteger('area_atuacao_id');

            $table->foreign('vaga_id')->references('id')->on('vagas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('area_atuacao_id')->references('id')->on('areas_atuacao')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['vaga_id', 'area_atuacao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas_areas_atuacao');
    }
}
