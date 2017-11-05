<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Business;
use Illuminate\Http\Request;
use Session;

class CategoriesController extends Controller
{
    
	public function __construct()
    {
    	//For now i will bring the categories and subcategories here. 
    	$cat = (new Category)->getCategoriesAll();
    	Session::put('categories', $cat);


    }

    // Show all subcategories from that categorie
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

    	$data['subcategories'] = (new Category)->getCategoriesById($slug);
    	//Get the last items created in the category.
    	$data['lastCreatedByCategory'] = (new Business)->lastCreatedByCategory($data['subcategories']->cat_id);
    	//dd($data['lastCreatedByCategory']);
    	return \View::make('frontend.categories', $data);
    }

    public function subcategories($slug, $subcategory)
    {
    	if(!isset($slug) && !isset($subcategory)) {
    		 return abort(404);
    	}

    	if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
        }

        if (Session::has('userInfo')) {
            $data['userInfo'] = Session::get('userInfo');
        }

        //Get Category and Subcategory Information. 
        $data['subcategory'] = (new Subcategory)->getSubcategoryInformationBySlug($subcategory);

        //Return all products of subcategory. 
        $data['businessSubcategoty'] = (new Business)->getBusinessBySubcat($data['subcategory']->scat_id);
    	return \View::make('frontend.subcategories', $data);
    }
}
