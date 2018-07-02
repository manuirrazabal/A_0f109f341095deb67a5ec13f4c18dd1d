<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\States;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Generals variables for all controllers.
     *
     * @var string
     */
    public $category;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {	 
        // Get All categories
        $this->category = (new Category)->getCategoriesAll();
        view()->share("categories", $this->category);

        //So far will be by hand until I allow other countries
        $reg = (new States)->listStatesByCountry(43);
        view()->share("regiones", $reg);


        $this->middleware(function ($request, $next) {
            // If the user is logged in, Proccess some variables.
            if (Auth::check()) {

            }


            //dd(Auth::user());
            //$this->user= Auth::user();

            return $next($request);
        });
    }


}
