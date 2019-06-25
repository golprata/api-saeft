<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Motivo;
use App\User;
use App\RegistroDiario;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(RegistroDiario::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 2, $max = 10),
        'motivo_id'    => $faker->numberBetween($min = 1, $max = 3),
        'quantidade'    => $faker->numberBetween($min = 0, $max = 20),
    ];
});
