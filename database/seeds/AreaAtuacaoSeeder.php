<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaAtuacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas_atuacao')->insert([
            ['nome' => 'Administração'],
            ['nome' => 'Arquitetura e Urbanismo'],
            ['nome' => 'Direito'],
            ['nome' => 'Educação Física'],
            ['nome' => 'Engenharia Civil'],
            ['nome' => 'Pedagogia'],
            ['nome' => 'Tecnologia da Informação'],
        ]);
    }
}
