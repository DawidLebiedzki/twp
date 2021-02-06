<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'company_code' => $faker->countryCode,
        'company_name' => $faker->company,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'street' => $faker->streetAddress,
        'country' => $faker->country,
        'phone_number' => $faker->phoneNumber,
        'contact_person' => $faker->name($gender = null)
    ];
});
