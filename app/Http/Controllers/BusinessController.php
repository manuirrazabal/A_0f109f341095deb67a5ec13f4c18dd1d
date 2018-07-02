<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessImages;
use App\Models\States;
use App\Models\Cities;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Session;
use Carbon\Carbon;

class BusinessController extends Controller
{
    /**
     *	Index, Show the list of business created by user.
     *
     **/
    public function index()
    {
    	//Like always, check the user information, move into a middleware later
    	// if (!Session::has('userInfo')) {
     //        return redirect()->to('/login');
     //    }

        $data['userInfo'] = Session::get('userInfo');

        //List business from user. 
        $bus = new Business;
        $data['businessActive'] = $bus->getBusiness(json_decode($data['userInfo'])->user_id);
        $data['businessInactive'] = $bus->getBusinessInactives(json_decode($data['userInfo'])->user_id);
        return \View::make('backend.business', $data);
    }

     /**
     *  ADD, a new business
     *
     **/
    public function add(Request $request)
    {
    	//Like always, check the user information, move into a middleware later
    	// if (!Session::has('userInfo')) {
     //        return redirect()->to('/login');
     //    }
        $data['userInfo']   = Session::get('userInfo');

        // Checking if the user doesnt have more than 3 records. 
        if ((new Business)->countBusiness(json_decode($data['userInfo'])->user_id) > 3) {
            return redirect()->to('/business')->with('error', 'Lo sentimos. No puedes crear mas de tres anuncios.');
        }

        //List business from user. 
        $bus = new Business;
        $data['regiones']   = (new States)->listStatesByCountry(43);
        $data['categorias'] = (new Category)->getCategoriesAll();
        

        // POST
        if ($request->isMethod('post')) {
            $rules = array(
                'businessName'      => 'required|string|max:255',
                'businessAddress'   => 'required|string',
                'businessState'     => 'required',
                'businessCity'      => 'required',
                'businessEmail'     => 'required',
                'businessCategory'  => 'required',
                'businessSubcategory' => 'required'
            );

            $messages = array(
                'businessName.required' => 'Por favor ingresar el nombre',
                'businessAddress.required' => 'Por favor ingresar la direccion',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $arr = array(
                'business_name' => $request->input('businessName'),
                'business_address' => $request->input('businessAddress'),
                'business_city' => $request->input('businessCity'),
                'business_phone' => $request->input('businessPhone'),
                'business_mail' => $request->input('businessEmail'),
                'business_postalcode' => $request->input('businessPostal'),
                'business_cat_id' => $request->input('businessSubcategory'),
                'business_webpage'  => $request->input('businessWeb'),
                'business_slug' => returnFriendlyUrl($request->input('businessCity').json_decode($data['userInfo'])->user_id."-".$request->input('businessName')),
                'bdetail_detail' => $request->input('businessDetail'),
                'bdetail_schedulle' => $request->input('businessSchedulle'),
                'bdetail_more_info' => $request->input('businessMoreInformation'),
                'business_active'   => 1,
                'business_user_id'  => json_decode($data['userInfo'])->user_id,

            );

            $resp = $bus->addBusiness($arr);

            if ($resp['ok']) {
                return redirect()->to('/adm/business/imagenes/'.$resp['id'])->with('message', 'Tu anuncio ya fue creado, ahora puedes agregar tus imagenes.');
            } else {
                return back()->withErrors([$resp['error']])->withInput();
            }
        }

        return \View::make('backend.business-new', $data);
    }

    /**
     *	Editar Business.
     *
     **/
    public function edit($id, Request $request)
    {
    	//Like always, check the user information, move into a middleware later
    	// if (!Session::has('userInfo')) {
     //        return redirect()->to('/login');
     //    }

        $data['userInfo'] = Session::get('userInfo');

        //List business from user. 
        $bus = new Business;
        $data['businessDetail'] = $bus->getBusinessById($id ,json_decode($data['userInfo'])->user_id);
        $data['regiones'] 		= (new States)->listStatesByCountry(43);
        $data['regionFather'] 	= (new Cities)->listStateFather($data['businessDetail']->business_city);
        $data['cities'] 		= (new Cities)->listCitiesByState($data['regionFather']);

        $data['categorias'] 	= (new Category)->getCategoriesAll();
        $data['categoryFather'] = (new Subcategory)->getCategoryFather($data['businessDetail']->business_cat_id);
        $data['subcategories'] 	= (new Subcategory)->getSubcatoryById($data['categoryFather']);

        // POST
        if ($request->isMethod('post')) {
            $rules = array(
                'businessName'      => 'required|string',
                'businessAddress'   => 'required|string',
                'businessState'     => 'required',
                'businessCity'      => 'required',
                'businessEmail'     => 'required',
                'businessCategory'  => 'required',
                'businessSubcategory' => 'required',
            );

            $messages = array(
                'businessName.required' => 'Por favor ingresar el nombre',
                'businessAddress.required' => 'Por favor ingresar la direccion',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $arr = array(
                'business_name' => $request->input('businessName'),
                'business_address' => $request->input('businessAddress'),
                'business_city' => $request->input('businessCity'),
                'business_phone' => $request->input('businessPhone'),
                'business_mail' => $request->input('businessEmail'),
                'business_postalcode' => $request->input('businessPostal'),
                'business_cat_id' => $request->input('businessSubcategory'),
                'business_slug' => returnFriendlyUrl($request->input('businessCity').json_decode($data['userInfo'])->user_id."-".$request->input('businessName')),
                'bdetail_detail' => $request->input('businessDetail'),
                'bdetail_schedulle' => $request->input('businessSchedulle'),
                'bdetail_more_info' => $request->input('businessMoreInformation'),
            );

            $resp = $bus->updateBusiness($arr, $id);

            if ($resp['ok']) {
                return redirect()->to('/adm/business')->with('message', 'Datos Actualizados Exitosamente');
            } else {
                return back()->withErrors([$resp['error']])->withInput();
            }
        }

        return \View::make('backend.business-edit', $data);
    }

    /**
     *  DELETE business
     *
     **/
    public function delete($id)
    {  
        //Like always, check the user information, move into a middleware later
        // if (!Session::has('userInfo')) {
        //     return redirect()->to('/login');
        // }

        $data['userInfo'] = Session::get('userInfo');

        $bus = new Business;
        $resp = $bus->deleteBusiness($id, json_decode($data['userInfo'])->user_id);

        if ($resp['ok']) {
            return redirect()->to('/adm/business')->with('message', 'Anuncio eliminado exitosamente');
        } else {
            return back()->withErrors([$resp['error']]);
        }
    }

     /**
     *  ADD/EDIT business images.
     *
     **/
    public function images($id, Request $request)
    {
        //Like always, check the user information, move into a middleware later
        // if (!Session::has('userInfo')) {
        //     return redirect()->to('/login');
        // }

        $data['userInfo'] = Session::get('userInfo');
        $data['businessImages'] = (new BusinessImages)->getAll($id);
        $data['id'] = $id;

        if ($request->isMethod('post')) {
            $rules = array(
                'bimageUpload'      => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            );

            $messages = array(
                'bimageUpload.required' => 'El campo imagen es requerido.',
                'bimageUpload.image' => 'Debes ingresar un formato de imagen valida.',
            );

            $dataValidation = $request->all();
            $validator = Validator::make($dataValidation, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            //UPLOAD IMAGE.  
            $fileName = "image-".json_decode($data['userInfo'])->user_id."-".$id."-".Carbon::now()->timestamp.".".$request->file('bimageUpload')->getClientOriginalExtension();
     
            $path = Storage::putFileAs('uploads', $request->file('bimageUpload'), $fileName, 'public');
            if ($path) {
                $resp = (new BusinessImages)->addImage(['bimages_business_id' => $id, 'bimages_route' => $path]);

                if ($resp['ok']) {
                    return redirect()->to('/adm/business/imagenes/'.$id)->with('message', 'Imagen agregada exitosamente');
                } else {
                    return back()->withErrors([$resp['error']])->withInput();
                }
            }
        }

        return \View::make('backend.business-images', $data);
    }

    /**
     *  DELETE business images.
     *
     **/
    public function deleteImages($id)
    {
        //Like always, check the user information, move into a middleware later
        // if (!Session::has('userInfo')) {
        //     return redirect()->to('/login');
        // }

        //If doenst exist the id and if null, sent to login page. 
        if (!isset($id) && empty($id)) {
            return redirect()->to('/login');
        }

        $image = (new BusinessImages)->getImageDetail($id);
        if (isset($image)) {
            //If the image doesnt start with http. 
            if (isset($image->bimages_route) && substr($image->bimages_route, 0, 4) != "http") {
                //Proceed to delete the image. 
                if (Storage::disk('uploads')->exists($image->bimages_route)) {
                    Storage::disk('uploads')->delete($image->bimages_route);
                } else {
                    return back()->withErrors(["Opps Algo sucedio, la imagen no existe"])->withInput();
                }
            }

            $businesId = $image->bimages_business_id;

            //DELETE the RECORD FROM DATABASE.
            $delete = $image->forceDelete();

            if ($delete) {
                 return redirect()->to('/adm/business/imagenes/'.$businesId)->with('message', 'Imagen eliminada exitosamente');
            } else {
                return back()->withErrors(["Opps Algo sucedio, que no esperabamos"])->withInput();
            }

        }
    }

    /**
     *  INACTIVE business.
     *
     **/
    public function inactivate($id)
    {
         //Like always, check the user information, move into a middleware later
        // if (!Session::has('userInfo')) {
        //     return redirect()->to('/login');
        // }

        //If doenst exist the id and if null, sent to login page. 
        if (!isset($id) && empty($id)) {
            return redirect()->to('/login');
        }

        $resp = (new Business)->activateBusiness($id, 0);

        if ($resp['ok']) {
            return redirect()->to('/adm/business')->with('message', 'Anuncio desactivado exitosamente');
        } else {
            return back()->withErrors([$resp['error']])->withInput();
        }
    }

    /**
     *  INACTIVE business.
     *
     **/
    public function activate($id)
    {
         //Like always, check the user information, move into a middleware later
        // if (!Session::has('userInfo')) {
        //     return redirect()->to('/login');
        // }

        //If doenst exist the id and if null, sent to login page. 
        if (!isset($id) && empty($id)) {
            return redirect()->to('/login');
        }

        $resp = (new Business)->activateBusiness($id, 1);

        if ($resp['ok']) {
            return redirect()->to('/adm/business')->with('message', 'Anuncio activado exitosamente');
        } else {
            return back()->withErrors([$resp['error']])->withInput();
        }
    }
}
