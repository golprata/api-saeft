<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class, 1)->create([
            'name' => 'Carteiro',
            'label' => 'Empregados que realizam a entraga'
        ]);
        factory(App\Role::class, 1)->create([
            'name' => 'Gerente',
            'label' => 'Gerente da unidade'
        ]);
        factory(App\Role::class, 1)->create([
            'name' => 'Gestor Operacional',
            'label' => 'Gerente geral das atividades externas'
        ]);
    }
}
