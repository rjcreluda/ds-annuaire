<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => function(array $profile){ 
            //return App\User::inRandomOrder()->first()->id;
            //return factory(\App\User::class)->create( ['user_id' => $profile['user_id']] )->id;
            return factory(\App\User::class)->create()->id;
        },
        'phone' => $faker->phoneNumber,
        'facebook' => ''
    ];
});