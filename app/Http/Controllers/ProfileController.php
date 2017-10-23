<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class ProfileController extends Controller
{
    
    /**
     *	Index, Show the main information of the user.
     *  and the same time you are able to change the 
     *  information in the same controller.
     *
     **/
    public function index(Request $request)
    {
        if (!Session::has('userInfo')) {
            return redirect()->to('/login');
        }

        $data['userInfo'] = Session::get('userInfo');

        // POST
        if ($request->isMethod('post')) {
            $rules = array(
                'first_name' => 'required|string',
                'last_name' => 'required|string',
            );

            $messages = array(
                'first_name.required' => 'Please enter your first Name.',
                'last_name.required' => 'Please enter your last name.',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $arr = array(
                'user_name' => $request->input('first_name'),
                'user_lastname' => $request->input('last_name'),
                'user_phone' => $request->input('phone')
            );

            $user = new Users;
            $resp = $user->updateUser($arr, json_decode($data['userInfo'])->user_id);

            if ($resp['ok']) {
            	// For Now Update the session here and later update.
            	$newUserData = $user->getUserId(json_decode($data['userInfo'])->user_id);
            	Session::forget('userInfo');
            	Session::put('userInfo', json_encode($newUserData));

                return redirect()->to('/profile')->with('message', 'Datos Actualizados Exitosamente');
            } else {
                return back()->withErrors([$resp['error']])->withInput();
            }
        }

        return \View::make('user.profile', $data);
    }

     /**
     *	Password, Is the method that you are able
     *  to change the password of the user. 
     *
     **/
    public function password(Request $request)
    {
        if (!Session::has('userInfo')) {
            return redirect()->to('/login');
        }

        $data['userInfo'] = Session::get('userInfo');

        // POST
        if ($request->isMethod('post')) {
            $rules = array(
                'old_password'  => 'required',
                'new_password'  => 'required|min:6',
                'new_password2' => 'required|same:new_password',
                
            );

            $messages = array(
                'old_password.required'     => 'Por favor ingrese su contraseña actual.',
                'new_password.required'     => 'Por favor ingrese su nueva contraseña',
                'new_password2.required'    => 'Por favor repita su nueva contraseña',
                'new_password.min'          => 'Su contraseña al menos debe tener %s caracteres.',
                'new_password2.same'          => 'Las contraseñas deben coincidir',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            //Check if the passwords is the same like the user has.
            if (!(new Users)->checkPassword(json_decode($data['userInfo'])->user_id, md5($request->old_password))) {
                return back()->withErrors(["La contraseña actual no coincide con la contraseña ingresada"])->withInput();
            }

            //Changing password.
            $user = new Users;
            $resp = $user->changePasswordUser(json_decode($data['userInfo'])->user_id, md5($request->new_password));

            if ($resp['ok']) {
                return redirect()->to('/profile')->with('message', 'Datos Actualizados Exitosamente');
            } else {
                return back()->withErrors([$resp['error']])->withInput();
            }       
        }

        return \View::make('user.password', $data);

    }
}
