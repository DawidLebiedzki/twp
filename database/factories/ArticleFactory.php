<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'article_number_intern' => $faker->unique()->numerify('F#####'),
        'article_number_customer' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'article_index' => $faker->bothify('##??'),
        'name' => $faker->word,
        'drawing_number' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'drawing_index' => $faker->bothify('#??'),
        'profil_number' => $faker->numberBetween($min = 10, $max = 900),
        'customer_id' => factory(App\Customer::class)
    ];
});
