<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create([
            'name' => 'Fabiano Costa',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        // factory(App\User::class, 10)->create();
    }
}
