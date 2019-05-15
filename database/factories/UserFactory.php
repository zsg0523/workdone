<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
	static $password;
	$now = Carbon::now()->toDateTimeString();


    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'sex' => $faker->boolean,
        'password' => $password ?: $password = bcrypt('password'), // password
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'description' => $faker->sentence(),
        'created_at' => $now,
        'updated_at' => $now,
        'last_actived_at' => $now,

    ];
});
