<?php

namespace Database\Factories;

use App\Noticeboard;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

$factory->define(Noticeboard::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'user_id' => User::all()->random()->id,
        'created_at' => now(),
    ];
});
