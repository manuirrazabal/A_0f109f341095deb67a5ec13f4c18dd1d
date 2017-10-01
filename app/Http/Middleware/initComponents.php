<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Models\Category;

class initComponents
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         *  Checking if the categories are setup.
        **/

        // if (!Session::has('categories')) {
        //     $cat = (new Category)->getCategoriesAll();
        //     Session::put('categories', $cat);
        //     $request["categories"] = $cat;
        // } 

        return $next($request);
    }
}
