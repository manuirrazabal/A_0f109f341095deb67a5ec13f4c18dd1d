<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function __construct()
    {
    	//For now i will bring the categories and subcategories here. 
    	$cat = (new Category)->getCategoriesAll();
    	Session::put('categories', $cat);
    }


    public function index()
    {
    	if (Session::has('categories')) {
    		$data['categories'] = Session::get('categories');
    	}

    	return \View::make('container', $data);
    }
}
