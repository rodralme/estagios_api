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
        $areas = [
            ['nome' => 'Administração'],
            ['nome' => 'Arquitetura e Urbanismo'],
            ['nome' => 'Direito'],
            ['nome' => 'Educação Física'],
            ['nome' => 'Engenharia Civil'],
            ['nome' => 'Pedagogia'],
            ['nome' => 'Tecnologia da Informação'],
        ];

        foreach ($areas as $area) {
            \App\Models\AreaAtuacao::create($area);
        }
    }
}
