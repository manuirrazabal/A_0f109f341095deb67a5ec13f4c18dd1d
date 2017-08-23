<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table Scheme: Users
        Schema::create(
            'an_users',
            function (Blueprint $table) {
                $table->increments('user_id');
                $table->string('user_name', 128);
                $table->string('user_lastname', 128);
                $table->string('user_email')->unique();
                $table->string('user_password');
                $table->string('user_phone');
                $table->boolean('user_active')->default(1);
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            }
        );

        // Table Scheme: Business
        Schema::create(
            'an_business',
            function (Blueprint $table) {
                $table->increments('business_id');
                $table->string('business_name', 128);
                $table->string('business_address');
                $table->integer('business_city');
                $table->string('business_phone');
                $table->string('business_mail');
                $table->string('business_postalcode');
                $table->integer('business_cat_id');
                $table->text('bdetail_schedulle');
                $table->text('bdetail_detail');
                $table->text('bdetail_more_info');
                $table->boolean('business_active')->default(1);
                $table->timestamps();
                $table->softDeletes();
            }
        );

        // Table Scheme: Business Images
        Schema::create(
            'an_business_images',
            function (Blueprint $table) {
                $table->increments('bimages_id');
                $table->integer('bimages_business_id');
                $table->string('bimages_route', 255);
                $table->timestamps();
                $table->softDeletes();
            }
        );

        // ** GENERAL CONFIGURATION

        // Table Scheme: Country
        Schema::create(
            'an_country',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('country_code')->unique();
                $table->string('country_name')->unique();
                $table->boolean('country_active')->default(1);
                $table->timestamps();
            }
        );

        // Table Scheme: State
        Schema::create(
            'an_states',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('state_name', 255);
                $table->integer('state_number');
                $table->integer('state_country_id');
                $table->boolean('state_active')->default(1);
                $table->timestamps();
            }
        );

        // Table Scheme: Cities
        Schema::create(
            'an_cities',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('city_name', 255);
                $table->string('city_code', 15);
                $table->integer('city_state_id');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('an_users');
        Schema::dropIfExists('an_business');
        Schema::dropIfExists('an_business_images');
        Schema::dropIfExists('an_country');
        Schema::dropIfExists('an_states');
        Schema::dropIfExists('an_cities');
    }
}
