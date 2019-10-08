<?php

use App\Models\AreaAtuacao;
use App\Models\Empresa;
use App\Models\Vaga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $areas = [];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreaAtuacaoSeeder::class);

//        factory(Pessoa::class, 58)->create();

        $this->areas = AreaAtuacao::all(['id'])->pluck('id')->toArray();

        factory(Empresa::class, 5)->create()->each(function ($empresa) {
            factory(Vaga::class, rand(4, 12))
                ->create([
                    'empresa_id' => $empresa->id,
                    'area_atuacao_id' => $this->areas[0],
                    'usuario_id' => 1,
                ])
                ->each(function ($vaga) {
                    $vaga->area_atuacao_id = $this->areas[array_rand($this->areas, 1)];
                    $vaga->save();
                });
        });
    }
}
