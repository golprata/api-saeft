<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Motivo;
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

$factory->define(Motivo::class, function (Faker $faker) {
    return [
        'descricao' => $faker->name,
        'status'    => 0, //numberBetween($min = 1000, $max = 9000)
    ];
});
