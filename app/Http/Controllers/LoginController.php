<?php

namespace App\Http\Controllers;

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

    protected $rulesRegister = ['first_name' => 'required|max:128',
                                'last_name' => 'required|max:128',
                                'email'     => 'required|email|unique:an_users,user_email',
                                'password'  => 'required|min:6',
                                'password2' => 'required|same:password',];

    protected $messageRegister = [  'first_name.required' => 'Por favor ingresa tu nombre.',
                                    'last_name.required' => 'Por favor ingresa tu apellido.',
                                    'email.required' => 'Por favor ingresa tu  email.',
                                    'email.email' => 'Por favor ingresa un email valido.',
                                    'password.required' => 'Por favor ingresa tu contrase&ntilde;a.',
                                    'password2.required' => 'Por favor ingresa la confirmaci&oacute;n de tu contrase&ntilde;a',
                                    'password.min' => 'Tu contrase&ntilde;a debe ser al menos %s caracteres.',
                                    'password2.same' => 'Las contrase&ntilde;as no coinciden.',];


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
            // $user = new Users;
            // $resp = $user->loginUser($request->input('email'), md5($request->input('password')));
           
            // if ($resp['ok']) {
            //     return redirect()->to('/');
            // } else {
            //     return back()->withErrors([$resp['error']])->withInput();
            // }
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
        $data['title'] = 'HandyList - Registrate';

        // if (Session::has('userInfo')) {
        //     return  redirect()->to('/');
        // }

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $this->rulesRegister, $this->messageRegister);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $arr = array(
                'user_name' => $request->input('first_name'),
                'user_lastname' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => md5($request->input('password')),
                'user_phone' => $request->input('phone'),
                'user_active' => 1,
                'user_type_id' => 2
            );

            $user = new Users;
            $resp = $user->createUser($arr);

            if ($resp['ok']) {
                // SEND AN EMAIL. 
                $content = array(
                    'title'    => 'Felicidades tu nueva cuenta a sido creada exitosamente',
                );
                
                $mailArray = array(
                    'to'        => $request->input('email'),
                    'subject'   => '[Anuncios Contacto] - Registro exitoso, Felicidades!',
                    'content'   => $content,
                    'template'  => 'emails.register'
                );

                if ((new MailServicesHelper)->sendMail($mailArray)) {
                    return redirect()->to('adm/profile')->with('message', 'Felicidades, Tu cuenta ha sido creada exitosamente');
                }
                
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
