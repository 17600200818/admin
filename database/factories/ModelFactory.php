<?php

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
