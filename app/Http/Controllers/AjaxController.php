<?php

namespace App\Http\Controllers;

use App\Models\States;
use App\Models\Cities;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Session;

class AjaxController extends Controller
{
    /**
     *  Get cities from states
     *
     **/
    public function states($id)
    {
        $states = (new Cities)->listCitiesByState($id);
        return json_encode($states);
    }

    /**
     *  Get cities from states
     *
     **/
    public function subcategory($id)
    {
        $subcategories = (new Subcategory)->getSubcatoryById($id);
        return json_encode($subcategories);
    }
}
