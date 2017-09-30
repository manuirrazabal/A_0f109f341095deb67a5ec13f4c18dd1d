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
$factory->define(App\Models\Users::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_name'     => isset($user_name) ?: $user_name = $faker->name,
        'user_lastname' => isset($user_lastname) ?: $user_lastname = $faker->lastName,
        'user_email'    => isset($user_email) ?: $user_email = $faker->unique()->safeEmail,
        'user_password' => isset($user_password) ?: $user_password =  bcrypt('secret'),
        'user_phone'    => isset($user_phone) ?: $user_phone = $faker->phoneNumber,
        'user_active'   => isset($user_active) ?: $user_active = 1,
        'user_type_id'  => isset($user_type_id) ?: $user_type_id = 1,
        'remember_token' => str_random(10),
    ];
});

// Request Factory For Contries
$factory->define(
    App\Models\UserTypes::class,
    function (Faker\Generator $faker) {
        return [
        'user_type_description'            => isset($user_type_description) ?: $user_type_description = $faker->word,
        ];
    }
);

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

<<<<<<< HEAD

// Request Factory For Bussiness
=======
// Request Factory Business
>>>>>>> 4b184b4765e287e264daf00d999b29f0789bd09d
$factory->define(
    App\Models\Business::class,
    function (Faker\Generator $faker) {
        return [
<<<<<<< HEAD
        'business_name'         => isset($business_name) ?: $business_name = $faker->company,
        'business_address'      => isset($business_address) ?: $business_address = $faker->streetAddress,
        'business_city'         => App\Models\Cities::inRandomOrder()->first()->id,
        'business_phone'        => isset($business_phone) ?: $business_phone = $faker->phoneNumber,
        'business_mail'         => isset($business_mail) ?: $business_mail = $faker->companyEmail,
        'business_postalcode'   => isset($business_postalcode) ?: $business_postalcode = $faker->postcode,
        'business_cat_id'        => App\Models\Subcategory::inRandomOrder()->first()->scat_id,
        'business_active'        => isset($business_active) ?: $business_active = 1,
        'business_user_id'        => App\Models\Users::inRandomOrder()->first()->user_id,
=======
        'business_user_id'  => App\Models\Users::inRandomOrder()->first()->user_id,
        'business_name'     => isset($business_name) ?: $business_name = $faker->company,
        'business_address'  => isset($business_address) ?: $business_address = $faker->streetAddress,
        'business_city'     => App\Models\Cities::inRandomOrder()->first()->id,
        'business_phone'    => isset($business_phone) ?: $business_phone = $faker->phoneNumber,
        'business_mail'     => isset($business_mail) ?: $business_mail = $faker->companyEmail,
        'business_postalcode' => isset($business_postalcode) ?: $business_postalcode = $faker->postcode,
        'business_cat_id'   => App\Models\Subcategory::inRandomOrder()->first()->scat_id,
        'bdetail_schedulle' => isset($bdetail_schedulle) ?: $bdetail_schedulle = $faker->sentence,
        'bdetail_detail'    => isset($bdetail_detail) ?: $bdetail_detail = $faker->paragraph,
        'bdetail_more_info' => isset($bdetail_more_info) ?: $bdetail_more_info = $faker->text,
        'business_active'   => isset($business_active) ?: $business_active = 1,
        ];
    }
);


// Request Factory BusinessImages
$factory->define(
    App\Models\BusinessImages::class,
    function (Faker\Generator $faker) {
        return [
        'bimages_business_id'  => App\Models\Business::inRandomOrder()->first()->business_id,
        'bimages_route'         => isset($bimages_route) ?: $bimages_route = $faker->imageUrl,
>>>>>>> 4b184b4765e287e264daf00d999b29f0789bd09d
        ];
    }
);