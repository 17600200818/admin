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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    $status = random_int(1, 4);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
        'tel' => $faker->phoneNumber,
        'last_login_ip' => $faker->localIpv4,
        'status' => $status
    ];
});

$factory->define(\App\Models\Advertiser::class, function(Faker\Generator $faker){

    return [
        'name' => $faker->name,
        'buyer_id' => 100001,
        'buyer_advertiser_id' => rand(500, 100),
        'site_name' => $faker->name,
        'domain' => $faker->domainName,
        'created_at' => $faker->time('Y-m-d h:i:s'),
        'status' => rand(1, 4),
    ];
});