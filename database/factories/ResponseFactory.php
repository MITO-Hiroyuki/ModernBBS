<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Response::class, function (Faker $faker) {
    return [
            'comment_id' => $faker->numberBetween(1,20),
            'user_id' => $faker->numberBetween(1,2),
            'response_text' => 'test_response',
    ];
});
