<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'FirstName' => $faker->firstName,
        'LastName' => $faker->lastName,
        'Username' => $faker->userName,
        'PhoneNumber' => '09301040145',
        'Rule' => 'Visitor',
        'City' => $faker->city,
        'Country' => $faker->country,
        'Gender' => 'Male',
        'Image' => 'assets/img/NoPic.png',
        'email' => $faker->email,
        'password' => Hash::make('12345678'),
    ];
});
