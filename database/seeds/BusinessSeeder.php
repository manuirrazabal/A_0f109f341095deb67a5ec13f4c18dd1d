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
       	for ($i=0; $i < 50; $i++) { 
       		$business = factory(Business::class, 1)->create(); 

       		factory(Business::class, 1)->create(
       			[
       			'bimages_business_id' => $business->first()->business_id,
       			]
       		);
       	}
    	


       
    }
}
