<?php

use App\Models\Users;
use App\Models\UserTypes;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $initUsers = array(
    	[ 'Manuel',  'Test', 'manuirrazabal@manuirrazabal.com', '20c4671c7be6832525c330b27c35cb12', '11111111', '1', '1']
    	);

    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $initTypes = ['Root', 'Final User'];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->initTypes as $type) {
            if (UserTypes::where('user_type_description', $type)->count() == 0) {
                $type = factory(UserTypes::class, 1)->create(
                    [
                        'user_type_description' => $type,
                    ]
                ); 
            }
        }


        //Loading and saving countries
        foreach ($this->initUsers as $users) {
        	//If Doesnt Exist Create It
        	if (Users::where('user_email', $users[2])->count() == 0) {
        		//Create a new record. 
        		$newUsers = factory(Users::class, 1)->create(
                    [
                        'user_name'    	=> $users[0],
                        'user_lastname' => $users[1],
                        'user_email'	=> $users[2],
                        'user_password'	=> $users[3],
                        'user_phone'	=> $users[4],
                        'user_active'	=> $users[5],
                        'user_type_id'	=> $users[6],
                        'remember_token' => str_random(10),
                     ]
                );
        	}
        }
    }
}
