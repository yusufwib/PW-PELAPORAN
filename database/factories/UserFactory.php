<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'nis' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'avatar' => $faker->imageUrl(400, 300, 'cats', true, 'Faker', true),
        'password' => bcrypt('senosabil'), // secret
    ];
});
