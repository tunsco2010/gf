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
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('Password@1$'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Supplier::class, function (Faker\Generator $faker) {

    $company_name = $faker->unique()->company;

    return [
        'name' => $faker->name,
        'company_name' => $company_name,
        'slug' => str_slug($company_name, "-"),
        'email' => $faker->unique()->companyEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {

    $email = $faker->unique()->email;

    return [
        'name' => $faker->name,
        'slug' => str_slug($email, "-"),
        'email' => $email,
        'phone' => $faker->unique()->phoneNumber,
        'address' => $faker->address
    ];
});
