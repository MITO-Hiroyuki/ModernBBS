<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
            'thread_id' => $faker->numberBetween(1,20),
            'comment_profile_id' => $faker->numberBetween(1,2),
            'comment_text' => 'testcomment',
            'response_count' => $faker->numberBetween(1,6),
            
    ];
});
