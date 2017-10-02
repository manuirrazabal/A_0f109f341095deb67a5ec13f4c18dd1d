<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ProfileController extends Controller
{
    public function index()
    {
        if (!Session::has('userInfo')) {
            return redirect()->to('/login');
        }

        $data['userInfo'] = Session::get('userInfo');

        return \View::make('user.profile', $data);
    }
}
