<?php

use App\Models\AreaAtuacao;
use Illuminate\Database\Seeder;

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
            ['nome' => 'Administração', 'sigla' => 'ADM'],
            ['nome' => 'Arquitetura e Urbanismo', 'sigla' => 'AU'],
            ['nome' => 'Direito', 'sigla' => 'DIR'],
            ['nome' => 'Educação Física', 'sigla' => 'EF'],
            ['nome' => 'Engenharia Civil', 'sigla' => 'ECI'],
            ['nome' => 'Pedagogia', 'sigla' => 'PED'],
            ['nome' => 'Tecnologia da Informação', 'sigla' => 'TI'],
        ];

        foreach ($areas as $area) {
            AreaAtuacao::create($area);
        }
    }
}
