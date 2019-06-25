<?php

use Illuminate\Database\Seeder;

class LotacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Lotacao::class, 1)->create([
            'nome' => 'CDD Rio Negro',
            'sigla' => 'RNG',
            'superintendencia' => 'AM'
        ]);
        factory(App\Lotacao::class, 1)->create([
            'nome' => 'CDD Manaus',
            'sigla' => 'MAO',
            'superintendencia' => 'AM'
        ]);
    }
}
