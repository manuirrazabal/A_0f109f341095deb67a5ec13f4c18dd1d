<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// Request Factory For Contries
$factory->define(
    App\Models\Country::class,
    function (Faker\Generator $faker) {
        return [
        'country_code'            => isset($country_code) ?: $country_code = $faker->country,
        'country_name'           => isset($country_name) ?: $country_name = $faker->stateAbbr,
        'country_active'               => isset($country_active) ?: $country_active = 0,
        ];
    }
);

// Request Factory For Contries
$factory->define(
    App\Models\States::class,
    function (Faker\Generator $faker) {
        return [
        'state_name'      	=> isset($state_name) ?: $state_name = $faker->state,
        'state_number'    	=> isset($state_number) ?: $state_number = $faker->randomDigitNotNull,
        'state_country_id'	=> isset($state_country_id) ?: $state_country_id = $faker->randomDigitNotNull,
        'state_active'		=> isset($state_active) ?: $state_active = 0,
        ];
    }
);

// Request Factory For Contries
$factory->define(
    App\Models\Cities::class,
    function (Faker\Generator $faker) {
        return [
        'city_name'     => isset($state_name) ?: $state_name = $faker->city,
        'city_code'    	=> isset($state_number) ?: $state_number = $faker->randomDigitNotNull,
        'city_state_id'	=> isset($state_country_id) ?: $state_country_id = $faker->randomDigitNotNull,
        ];
    }
);