<?php

namespace App\Http\Controllers;

use App\Helpers\MailServicesHelper;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a index 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        // if (\Session::has('userInfo')) {
        //     $data['userInfo'] = Session::get('userInfo');
        // }

        $data['lastBusiness'] = (new Business)->lastCreatedBusiness();
        //dd($data['lastBusiness'] );
        return \View::make('container', $data);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearch(Request $request)
    {
        if ($request->exists('q')) {

            if ($request->exists('cat')) {
                $filter['category'] = $request->input('cat');
                $data['cat']        = $request->input('cat');
            }

            if ($request->exists('loc')) {
                $filter['location']  = $request->input('loc');
                 $data['loc']        = $request->input('loc');
            }

            if ($request->exists('pagination')) {
                $filter['pagination'] = ($request->input('pagination'));
                $data['pagination']        = $request->input('pagination');
            } else {
                $filter['pagination'] = 10;
            }

            if ($request->exists('order')) {
                $filter['order'] = ($request->input('order'));
                $data['order']   = $request->input('order');
            } 

            $filter['q'] = $request->input('q');


            // Get Results from business
            $data['search'] = (new Business)->getSearchByName($filter);
            $data['q']      = $request->input('q');

            return \View::make('frontend.search', $data);
        }
    }

    /**
     * Display a contact form
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        $data['title'] = 'Cont&aacute;ctenos';
        
        // if (Session::has('userInfo')) {
        //     $data['userInfo'] = Session::get('userInfo');
        // }

        // POST
        if ($request->isMethod('post')) {
            $rules = array(
                'contactName' => 'required|string',
                'contactSubject' => 'required',
                'contactEmail'  => 'required|email',
                'contactMessage' => 'required',
            );

            $messages = array(
                'contactName.required' => 'Por favor ingrese su nombre',
                'contactName.string' => 'El nombre debe contener caracteres',
                'contactEmail.required' => 'Por favor ingrese su email',
                'contactEmail.email' => 'El email ingresado no es valido',
                'contactMessage.required' => 'Por favor ingrese su mensaje',
                'contactSubject.required' => 'Por favor ingrese el asunto del mensaje.',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $arr = array(
                'contactName' => $request->input('contactName'),
                'contactEmail' => $request->input('contactEmail'),
                'contactMessage' => $request->input('contactMessage'),
                'contactSubject' => $request->input('contactSubject')
            );

            $content = array(
                'title'    => 'Haz recibido un nuevo correo de contacto desde el formulario principal',
                'subtitle'  => 'Un usuario a completado el formulario de contacto para que te puedas comunicar con el',
                'nombre'   => $request->input('contactName'),
                'email'    => $request->input('contactEmail'),
                'mensaje'  => $request->input('contactMessage'),
            );
            
            $mailArray = array(
                'to'        => 'manuirrazabal@manuirrazabal.com',
                'from'      => $request->input('contactEmail'),
                'subject'   => '[Anuncios Contacto] - '.$request->input('contactSubject'),
                'content'   => $content,
                'template'  => 'emails.contact'
                );

            if ((new MailServicesHelper)->sendMail($mailArray)) {
                return redirect()->to('/contacto')->with('message', 'Formulario enviado exitosamente.');
            }
        }

        return \View::make('frontend.contacto', $data);
    }
}
