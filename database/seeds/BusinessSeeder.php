<?php

use App\Models\Business;
use App\Models\BusinessImages;
use App\Models\Users;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //Create Faker for business 
    	$business = factory(Business::class, 1)->create(
                [
                    'business_user_id' 	=>  Users::inRandomOrder()->first()->user_id,
                    'business_name' 	=> company,
                    'business_address' 	=> ,
                    'business_city' 	=> ,
                    'business_phone' 	=> ,
                    'business_mail' 	=> ,
                    'business_postalcode' => ,
                    'business_cat_id' 	=> ,
                    'bdetail_schedulle' => ,
                    'bdetail_detail' 	=> ,
                    'bdetail_more_info' => ,
                    'business_active'	=> ,
                ]
            ); 

       
    }
}
