<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasAreasInteresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_areas_interesse', function (Blueprint $table) {
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedInteger('area_atuacao_id');

            $table->foreign('pessoa_id')->references('id')->on('pessoas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('area_atuacao_id')->references('id')->on('areas_atuacao')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['pessoa_id', 'area_atuacao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas_areas_interesse');
    }
}
