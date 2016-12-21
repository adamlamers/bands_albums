<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Album::class, function (Faker\Generator $faker) {
    return [
        'band_id' => function() {
            return App\Band::all()->random()->id;
        },
        'name' => $faker->name,
        'recorded_date' => $faker->date,
        'release_date' => $faker->date,
        'number_of_tracks' => $faker->randomNumber(2),
        'label' => $faker->name,
        'producer' => $faker->name,
        'genre' => $faker->name,
    ];
});

$factory->define(App\Band::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'start_date' => $faker->date,
        'website' => $faker->url,
        'still_active' => $faker->boolean(),
    ];
});

