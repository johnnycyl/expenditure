<?php

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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Transaction::class, function (Faker $faker) {

    return [
        'name' => $faker->text($maxNbChars = 20),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000),
        'type' => $faker->randomElement($array = array ('Beauty', 'Electronics', 'Fashion', 'Food', 'Health', 'Home', 'Travel', 'Others')),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        'user_id' => 1,
    ];
});
