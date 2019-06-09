<?php

use App\Models\AreaAtuacao;
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
        DB::table('areas_atuacao')->delete();

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
