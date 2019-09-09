<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        
        'birth_year' => $faker->numberBetween(2000,2019),
        'birth_month' => $faker->numberBetween(1,12),
        'birth_day' => $faker->numberBetween(1,30),
        'gender' => $faker->randomElement(['man', 'woman']),
        'hobby' => $faker->word,
        'introduction' => $faker->sentence,
    ];
});
