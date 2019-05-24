<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfisPermissoesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->boolean('admin')->default(false);
            $table->tinyInteger('nivel');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->unsignedInteger('perfil_id')->after('id')->nullable();
            $table->foreign('perfil_id')->references('id')->on('perfis')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('permissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('tag', 50)->unique();
        });

        Schema::create('perfis_permissoes', function (Blueprint $table) {
            $table->unsignedInteger('perfil_id');
            $table->unsignedInteger('permissao_id');

            $table->foreign('perfil_id')->references('id')->on('perfis')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('permissao_id')->references('id')->on('permissoes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['perfil_id', 'permissao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfis_permissoes');
        Schema::dropIfExists('permissoes');

        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_perfil_id_foreign');
            $table->dropColumn('perfil_id');
        });
        Schema::dropIfExists('perfis');
    }
}
