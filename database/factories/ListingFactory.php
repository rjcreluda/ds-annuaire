<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    $companies = [
        'ExceptionRosemary',
        'DevelopmentPing',
        'ToolMango',
        'CoderScalable',
        'ConstantCircuit',
        'DeprecatedCooker',
        'PingPesto',
        'ITMega',
        'ScalablePie',
        'BinaryComputing',
        'MashupMill',
        'StuffMashup',
        'ExportRouter',
        'OverTaste',
        'ClusterRender',
        'StreamingThread',
        'LemonMeta',
        'ChocolateHacker',
        'CyberBug',
        'RaisinSmart',
    ];
    return [
        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'category_id' => $faker->numberBetween(1,7), 
        'name' => $faker->company, 
        'description' => $faker->realText(100), 
        'address' => $faker->address, 
        'email' => $faker->companyemail, 
        'website' => $faker->domainName, 
        'phone' => $faker->phoneNumber,
        'status' => $faker->numberBetween(0,1)
    ];
});
