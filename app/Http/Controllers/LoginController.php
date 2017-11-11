<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class LoginController extends Controller
{
    
    /**
     * LOG-IN into application.
     *
     *  Still on development. 
     *
     *
     *
     * @param  request $request
     **/
    public function login(Request $request)
    {
        if (Session::has('userInfo')) {
            return  redirect()->to('/');
        }

        if ($request->isMethod('post')) {
            //Rules
            $rules = array(
                'email'     => 'required|email',
                'password'  => 'required',
            );
            $messages = array(
                'email.required' => 'Please enter your email.',
                'email.email' => 'Please enter valid email.',
                'password.required' => 'Please enter your password.',
            );
            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $user = new Users;
            $resp = $user->loginUser($request->input('email'), md5($request->input('password')));
           
            if ($resp['ok']) {
                return redirect()->to('/');
            } else {
                return back()->withErrors([$resp['error']])->withInput();
            }
        }

        return \View::make('backend.login');
    }

    /**
     * REGISTER into application.
     *
     * @param  request $request
     **/
    public function register(Request $request)
    {
        if (Session::has('userInfo')) {
            return  redirect()->to('/');
        }

        if ($request->isMethod('post')) {
            $rules = array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email'     => 'required|email|unique:an_users,user_email',
                'password'  => 'required|min:6',
                'password2' => 'required|same:password',
            );

            $messages = array(
                'first_name.required' => 'Please enter your first Name.',
                'last_name.required' => 'Please enter your last name.',
                'email.required' => 'Please enter your email.',
                'email.email' => 'Please enter valid email.',
                'password.required' => 'Please enter your password.',
                'password2.required' => 'Please enter the confirmation of your password.',
                'password.min' => 'Please enter a password with at least %s characters.',
                'password2.same' => 'Passwords do not match, please check it.',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $arr = array(
                'user_name' => $request->input('first_name'),
                'user_lastname' => $request->input('last_name'),
                'user_email' => $request->input('email'),
                'user_password' => md5($request->input('password')),
                'user_phone' => $request->input('phone'),
                'user_active' => 1,
                'user_type_id' => 2
            );

            $user = new Users;
            $resp = $user->createUser($arr);

            if ($resp['ok']) {
                return redirect()->to('/');
            } else {
                return back()->withErrors([$resp['error']])->withInput();
            }
        }

        return \View::make('backend.register');
    }

    /**
     * LOGOUT of application.
     *
     * 
     **/
    public function logout()
    {
        if (Session::has('userInfo')) {
            Session::forget('userInfo');
        }

        return redirect()->to('/');
    }
}
