<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Business;
use Illuminate\Http\Request;
use Session;

class PostsController extends Controller
{
    public function __construct()
    {
    	//For now i will bring the categories and subcategories here. 
    	$cat = (new Category)->getCategoriesAll();
    	Session::put('categories', $cat);


    }

    public function index($slug)
    {
    	if(!isset($slug)) {
    		 return abort(404);
    	}

    	if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
        }

        if (Session::has('userInfo')) {
            $data['userInfo'] = Session::get('userInfo');
        }

        $data['business'] = (new Business)->getBusinessbySlug($slug);
    	
    	return \View::make('frontend.business', $data);
    }
}
