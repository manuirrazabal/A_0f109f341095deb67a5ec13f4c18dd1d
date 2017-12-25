<?php

namespace App\Http\Controllers;

use App\Helpers\MailServicesHelper;
use App\Models\Business;
use App\Models\Category;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class IndexController extends Controller
{
    public function __construct()
    {
    	//For now i will bring the categories and subcategories here. 
    	$cat = (new Category)->getCategoriesAll();
    	Session::put('categories', $cat);

        //So far will be by hand until I allow other countries
        $reg = (new States)->listStatesByCountry(43);
        Session::put('regiones', $reg);
    }


    public function index()
    {

        if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
        }

        if (Session::has('regiones')) {
            $data['regiones'] = Session::get('regiones');
        }

        if (Session::has('userInfo')) {
            $data['userInfo'] = Session::get('userInfo');
        }

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

            if (Session::has('categories')) {
                $data['categories'] = Session::get('categories');
            }

            if (Session::has('regiones')) {
                $data['regiones'] = Session::get('regiones');
            }

            if (($request->exists('cat'))) {
                $filter['category'] = ($request->input('cat'));
            }

            if (($request->exists('loc'))) {
                $filter['location']  = ($request->input('loc'));
            }

            if (($request->exists('pagination'))) {
                $filter['pagination'] = ($request->input('pagination'));
            } else {
                $filter['pagination'] = 1;
            }

            $filter['q'] = $request->input('q');


            // Get Results from business
            $data['search'] = (new Business)->getSearchByName($filter);
            $data['q']      = $request->input('q');

            return \View::make('frontend.search', $data);
        }
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
