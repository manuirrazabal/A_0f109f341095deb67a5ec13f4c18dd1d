<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
    	if (Session::has('categories')) {
    		$data['categories'] = Session::get('categories');
    	}

        if (Session::has('userInfo')) {
            $data['userInfo'] = Session::get('userInfo');
        }

=======
    	$data['categories'] = Session::get('categories');
>>>>>>> 4b184b4765e287e264daf00d999b29f0789bd09d
    	return \View::make('container', $data);
    }
}
