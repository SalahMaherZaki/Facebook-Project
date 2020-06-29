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
$factory->define(VoiceBook\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'location' => $faker->city,
        'website' => $faker->url,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(VoiceBook\Post::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function () {
            return factory(VoiceBook\User::class)->create()->id;
        }
    ];
});