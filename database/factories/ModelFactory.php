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

$factory->define(\App\Models\Advertiser::class, function(Faker\Generator $faker){

    return [
        'name' => $faker->name,
        'buyer_id' => 10,
        'buyer_advertiser_id' => rand(500, 100),
        'site_name' => $faker->name,
        'domain' => $faker->domainName,
        'created_at' => $faker->time('Y-m-d h:i:s'),
        'status' => rand(1, 4),
    ];
});

$factory->define(\App\Models\Buyer::class, function(Faker\Generator $faker){
    static $password;

    return [
        'email' => $faker->email,
        'password' => $password ?: $password = bcrypt('secret'),
        'role_id' => rand(1, 4),
        'linkman' => 'link'.$faker->name,
        'tel' => $faker->phoneNumber,
        'buy_type' => rand(1, 2),
        'creative_audit_type' => rand(1, 2),
        'company' => $faker->company,
        'address' => $faker->address,
        'zip' => rand(10000, 99999),
        'gain_type' => rand(0, 1),
        'gain_rate' => rand(1, 100),
        'last_login_ip' => $faker->ipv4,
        'created_at' => $faker->time('Y-m-d h:i:s'),
        'status' => rand(1, 4),
    ];
});