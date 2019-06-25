<?php

use Illuminate\Database\Seeder;

class MotivosTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        factory(App\Motivo::class, 1)->create([
            'descricao' => 'Ausente'
            ]);
            factory(App\Motivo::class, 1)->create([
                'descricao' => 'Fechado'
                ]);
                factory(App\Motivo::class, 1)->create([
                    'descricao' => 'Nº Inexixtente'
                    ]);



                }
            }
