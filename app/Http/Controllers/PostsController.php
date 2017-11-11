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
            'title'     => 'Withdrawal confirmation',
            'subtitle'  => "Your withdrawal was completed successfully",
            );
            
	        $mailArray = array(
	            'to'        => $data['business']->business_mail,
	            'subject'   => '[Anuncios] - Contacto desde usuario',
	            'content'   => $content,
	            'template'  => 'emails.notifications'
	            );

	        if ((new MailServicesHelper)->sendMail($mailArray)) {
	        	return redirect()->to('/b/'.$slug)->with('message', 'Formulario enviado exitosamente.');
	        }
            // $user = new Users;
            // $resp = $user->updateUser($arr, json_decode($data['userInfo'])->user_id);

            // if ($resp['ok']) {
            // 	// For Now Update the session here and later update.
            // 	$newUserData = $user->getUserId(json_decode($data['userInfo'])->user_id);
            // 	Session::forget('userInfo');
            // 	Session::put('userInfo', json_encode($newUserData));

            //     return redirect()->to('/profile')->with('message', 'Datos Actualizados Exitosamente');
            // } else {
            //     return back()->withErrors([$resp['error']])->withInput();
            // }
        }

        
    	
    	return \View::make('frontend.business', $data);
    }
}
