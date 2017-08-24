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

// Request Factory For States
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

// Request Factory For Cities
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

// Request Factory For Categories
$factory->define(
    App\Models\Category::class,
    function (Faker\Generator $faker) {
        return [
        'cat_description'   => isset($cat_description) ?: $cat_description = $faker->sentence,
        'cat_order'         => isset($cat_order) ?: $cat_order = $faker->randomDigitNotNull,
        'cat_active'        => isset($cat_active) ?: $cat_active = 1,
        ];
    }
);

// Request Factory For Categories
$factory->define(
    App\Models\Subcategory::class,
    function (Faker\Generator $faker) {
        return [
        'scat_cat_id'           => isset($scat_cat_id) ?: $scat_cat_id = $faker->randomDigitNotNull,
        'scat_description'      => isset($scat_description) ?: $scat_description = $faker->sentence,
        'scat_order'            => isset($scat_order) ?: $scat_order = $faker->randomDigitNotNull,
        'scat_active'           => isset($scat_active) ?: $scat_active = 1,
        ];
    }
);