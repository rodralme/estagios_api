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
        // $this->call(UsersTableSeeder::class);

        $this->areas = AreaAtuacao::all(['id'])->pluck('id')->toArray();

        factory(Empresa::class, 5)->create()->each(function ($empresa) {
            factory(Vaga::class, rand(1, 5))
                ->create(['empresa_id' => $empresa->id])
                ->each(function (Vaga $vaga) {
                    $index = array_rand($this->areas, 1);
                    $vaga->areas()->attach($this->areas[$index]);
                    $vaga->save();
                });
        });
    }
}
