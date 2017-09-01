<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function index()
    {
    	$data['categories'] = Session::get('categories');
    	return \View::make('container', $data);
    }
}
