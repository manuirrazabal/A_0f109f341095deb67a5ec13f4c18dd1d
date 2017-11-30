<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function __construct()
    {
    	//For now i will bring the categories and subcategories here. 
    	$cat = (new Category)->getCategoriesAll();
    	Session::put('categories', $cat);
    }


    public function index()
    {

        if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
        }

        if (Session::has('userInfo')) {
            $data['userInfo'] = Session::get('userInfo');
        }

        $data['lastBusiness'] = (new Business)->lastCreatedBusiness();
        //dd($data['lastBusiness'] );
        return \View::make('container', $data);
    }

    public function contact(Request $request)
    {
        if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
        }

        if (Session::has('userInfo')) {
            $data['userInfo'] = Session::get('userInfo');
        }

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
                'nombre'    => $request->input('contactName'),
                'email'    => $request->input('contactEmail'),
                'message'  => $request->input('contactMessage'),
            );
            
            $mailArray = array(
                'to'        => 'manuirrazabal@manuirrazabal.com',
                'from'      => $request->input('contactEmail'),
                'subject'   => '[Anuncios Contacto] - '.$request->input('contactSubject'),
                'content'   => $content,
                'template'  => 'emails.contact'
                );

            if ((new MailServicesHelper)->sendMail($mailArray)) {
                return redirect()->to('/b/'.$slug)->with('message', 'Formulario enviado exitosamente.');
            }
        }

        return \View::make('frontend.contacto', $data);
    }
}
