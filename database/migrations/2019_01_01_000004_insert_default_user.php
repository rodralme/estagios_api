<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertDefaultUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $perfil_id = DB::table('perfis')->insertGetId([
            'nome' => 'Administrador',
            'admin' => true,
            'nivel' => 0,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        DB::table('usuarios')->insertGetId([
            'nome' => 'Rodrigo Almeida',
            'email' => 'ti.rodrigoalmeida@gmail.com',
            'password' => bcrypt('ossonhossaocaminhosparaaalma'),
            'perfil_id' => $perfil_id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('usuarios')->delete();
        DB::table('perfis')->delete();
    }
}
