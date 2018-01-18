<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class LoginController extends Controller
{
    
    public function __construct()
    {
        //For now i will bring the categories and subcategories here. 
        $cat = (new Category)->getCategoriesAll();
        Session::put('categories', $cat);
    }

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

        if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
        }

        if ($request->isMethod('post')) {
            //Rules
            $rules = array(
                'email'     => 'required|email',
                'password'  => 'required',
            );
            $messages = array(
                'email.required' => 'Por favor ingresa tu email',
                'email.email' => 'Por favor ingresa un email valido',
                'password.required' => 'Por favor ingresa tu contrase&ntilde;a',
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

        return \View::make('backend.login', $data);
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

        if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
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
                'first_name.required' => 'Por favor ingresa tu nombre.',
                'last_name.required' => 'Por favor ingresa tu apellido.',
                'email.required' => 'Por favor ingresa tu  email.',
                'email.email' => 'Por favor ingresa un email valido.',
                'password.required' => 'Por favor ingresa tu contrase&ntilde;a.',
                'password2.required' => 'Por favor ingresa la confirmaci&oacute;n de tu contrase&ntilde;a',
                'password.min' => 'Tu contrase&ntilde;a debe ser al menos %s caracteres.',
                'password2.same' => 'Las contrase&ntilde;as no coinciden.',
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

        return \View::make('backend.register', $data);
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
