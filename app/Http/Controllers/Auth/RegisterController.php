<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Helpers\MailServicesHelper;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $rulesRegister = ['first_name' => 'required|max:128',
                                'last_name' => 'required|max:128',
                                'email'     => 'required|email|unique:an_users,email',
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $data['title'] = 'HandyList - Registrate';
        return \View::make('backend.register', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->rulesRegister, $this->messageRegister);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Users::create([
            'user_name' => $data['first_name'],
            'user_lastname' => $data['last_name'],
            'user_phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_active' => 1,
            'user_type_id' => 2,
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
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
    }
}
