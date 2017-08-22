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
                $table->string('user_name', 128)->nullable();
                $table->string('user_lastname', 128)->nullable();
                $table->string('user_email', 128);
                $table->string('user_password', 128);
                $table->string('user_phone', 128);
                $table->boolean('user_active')->default(1);
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
                $table->string('business_address', 255);
                $table->integer('business_city');
                $table->string('business_phone', 128);
                $table->string('business_mail', 128);
                $table->string('business_postalcode', 128);
                $table->integer('business_cat_id');
                $table->text('bdetail_schedulle', 128);
                $table->text('bdetail_detail', 255);
                $table->text('bdetail_more_info', 255);
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
                $table->string('bimages_detail', 255);
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
                $table->string('country_code', 128);
                $table->string('country_name', 255);
                $table->boolean('country_active')->default(1);
                $table->timestamps();
            }
        );

        // Table Scheme: State
        Schema::create(
            'an_state',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('state_name', 255);
                $table->integer('country_id');
                $table->timestamps();
            }
        );

        // Table Scheme: Cities
        Schema::create(
            'an_cities',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('city_name', 255);
                $table->integer('state_id');
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
        Schema::drop('an_users');
        Schema::drop('an_business');
        Schema::drop('an_business_images');
        Schema::drop('an_country');
        Schema::drop('an_state');
        Schema::drop('an_cities');
    }
}
