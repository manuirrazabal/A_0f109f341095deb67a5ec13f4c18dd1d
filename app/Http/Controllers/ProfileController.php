<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class ProfileController extends Controller
{
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
}
