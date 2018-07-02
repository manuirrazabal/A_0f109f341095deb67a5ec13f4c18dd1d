<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Helpers\MailServicesHelper;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $model = 'App\Models\Users';

    protected $rulesLogin = [ 'email'     => 'required|email',
                              'password'  => 'required', ];

    protected $messageLogin = [ 'email.required' => 'Por favor ingresa tu email',
                                'email.email' => 'Por favor ingresa un email v&aacute;lido',
                                'password.required' => 'Por favor ingresa tu contrase&ntilde;a', ];

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
        $data['title'] = 'HandyList - Iniciar Session';

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $this->rulesLogin, $this->messageLogin);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);

        }

        return \View::make('backend.login', $data);
    }

    /**
     * LOGOUT of application.
     *
     * 
     **/
    public function logout(Request $request)
    {
        $this->guard()->logout();

        // if (Session::has('userInfo')) {
        //     Session::forget('userInfo');
        // }

        $request->session()->invalidate();

        return redirect()->to('/');
    }

}
