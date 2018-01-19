<?php

namespace App\Http\Controllers;

use App\Helpers\MailServicesHelper;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class PostsController extends Controller
{
    public function __construct()
    {
    	//For now i will bring the categories and subcategories here. 
    	$cat = (new Category)->getCategoriesAll();
    	Session::put('categories', $cat);

    }

    /**
     * Show the business detail
     *
     *
     * @param  request $request
     * @param  string $slug
     **/
    public function index($slug, Request $request)
    {
    	// Same shit.
    	if(!isset($slug)) {
    		 return abort(404);
    	}

    	if (Session::has('categories')) {
            $data['categories'] = Session::get('categories');
        }

        if (Session::has('userInfo')) {
            $data['userInfo'] = Session::get('userInfo');
        }

        $data['business'] = (new Business)->getBusinessbySlug($slug);
        $data['categoryFather'] = (new Subcategory)->getCategorybySubcategory($data['business']->business_cat_id);

        // POST
        if ($request->isMethod('post')) {
        	$rules = array(
                'contactName' => 'required|string',
                'contactEmail' => 'required|email',
                'contactMessage' => 'required',
            );

            $messages = array(
                'contactName.required' => 'Por favor ingrese su nombre',
                'contactName.string' => 'El nombre debe contener caracteres',
                'contactEmail.required' => 'Por favor ingrese su email',
                'contactEmail.email' => 'El email ingresado no es valido',
                'contactMessage.required' => 'Por favor ingrese su mensaje',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if (empty($data['business']->business_mail)) {
            	return back()->withErrors(["Lo sentimos este anuncio no tiene su correo configurado."])->withInput();
            }

            $arr = array(
                'contactName' => $request->input('contactName'),
                'contactEmail' => $request->input('contactEmail'),
                'contactMessage' => $request->input('contactMessage')
            );

            $content = array(
                'nombre'    => $request->input('contactName'),
                'email'     => $request->input('contactEmail'),
                'mensaje'   => $request->input('contactMessage'),
            );
            
	        $mailArray = array(
	            'to'        => $data['business']->business_mail,
	            'subject'   => '[Anuncios] - Contacto desde usuario',
	            'content'   => $content,
	            'template'  => 'emails.contact'
	            );

	        if ((new MailServicesHelper)->sendMail($mailArray)) {
	        	return redirect()->to('/b/'.$slug)->with('message', 'Formulario enviado exitosamente.');
	        }
        }

    	return \View::make('frontend.business', $data);
    }
}
