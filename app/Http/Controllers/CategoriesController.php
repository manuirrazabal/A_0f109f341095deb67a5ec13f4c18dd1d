<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Business;
use Illuminate\Http\Request;
use Session;

class CategoriesController extends Controller
{

    /**
     *  Show all subcategories from that category father (slug)
     *
     **/
    public function index($slug)
    {
    	if(!isset($slug)) {
    		 return abort(404);
    	}

        // if (Session::has('userInfo')) {
        //     $data['userInfo'] = Session::get('userInfo');
        // }

    	$data['subcategories'] = (new Category)->getCategoriesById($slug);
    	//Get the last items created in the category.
    	$data['lastCreatedByCategory'] = (new Business)->lastCreatedByCategory($data['subcategories']->cat_id);
    	//dd($data['lastCreatedByCategory']);
    	return \View::make('frontend.categories', $data);
    }

    /**
     *  Show all Business from that category slug and subcategory
     *
     **/
    public function subcategories($slug, $subcategory)
    {
    	if(!isset($slug) && !isset($subcategory)) {
    		 return abort(404);
    	}

        // if (Session::has('userInfo')) {
        //     $data['userInfo'] = Session::get('userInfo');
        // }

        //Get Category and Subcategory Information. 
        $data['subcategory'] = (new Subcategory)->getSubcategoryInformationBySlug($subcategory);

        //Return all products of subcategory. 
        $data['businessSubcategoty'] = (new Business)->getBusinessBySubcat($data['subcategory']->scat_id);
    	return \View::make('frontend.subcategories', $data);
    }
}
