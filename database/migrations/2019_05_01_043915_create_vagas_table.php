<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->string('remuneracao')->nullable();
            $table->integer('carga_horaria')->nullable();
            $table->string('banner')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone', 15)->nullable();

            $table->unsignedInteger('area_atuacao_id');
            $table->foreign('area_atuacao_id')->references('id')->on('areas_atuacao')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas')
                ->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}
