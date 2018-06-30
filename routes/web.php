<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@login');

Route::get('register', 'LoginController@register');
Route::post('register', 'LoginController@register');

//WITH LOGIN BACKEND
Route::get('logout', 'LoginController@logout');

Route::prefix('adm')->group(function () {
	Route::get('/', 'ProfileController@index');
	
	Route::get('profile', 'ProfileController@index');
	Route::post('profile', 'ProfileController@index');
	Route::get('password', 'ProfileController@password');
	Route::post('password', 'ProfileController@password');

	//Business..
	Route::get('business', 'BusinessController@index');
	Route::get('business/nuevo', 'BusinessController@add');
	Route::post('business/nuevo', 'BusinessController@add');

	Route::get('business/delete/{id}', 'BusinessController@delete');
	Route::get('business/editar/{id}', 'BusinessController@edit');
	Route::post('business/editar/{id}', 'BusinessController@edit');

	Route::get('business/imagenes/{id}', 'BusinessController@images');
	Route::post('business/imagenes/{id}', 'BusinessController@images');
	Route::get('business/imagenes/{id}/delete', 'BusinessController@deleteImages');

	Route::get('business/inactivate/{id}', 'BusinessController@inactivate');
	Route::get('business/activate/{id}', 'BusinessController@activate');
});







/**
 * WITHOUT LOGIN, FRONT END. 
 *
 **/

// GET GENERAL INFORMATION ON FRONTEND
Route::get('contacto', 'IndexController@contact'); 
Route::post('contacto', 'IndexController@contact'); 



//GET CATEGORIES 
Route::get('c/{slug}', ['as' => 'categories.single', 'uses' => 'CategoriesController@index'])->where('slug', '[\w\d\-\_]+');

//GET Subcategories
Route::get('c/{slug}/{subcategory}', ['as' => 'subcategories.single', 'uses' => 'CategoriesController@subcategories'])->where('slug', '[\w\d\-\_]+')->where('subcategory', '[\w\d\-\_]+');

//GET POST
Route::get('b/{slug}', ['as' => 'business.single', 'uses' => 'PostsController@index'])->where('slug', '[\w\d\-\_]+');
Route::post('b/{slug}', ['as' => 'business.single', 'uses' => 'PostsController@index'])->where('slug', '[\w\d\-\_]+');

//GET SEARCH
Route::get('/search',['uses' => 'IndexController@getSearch','as' => 'search'])->where('q', '[\w\d\-\_]+');

//Protected Routes 
Route::get('ajax/state/{id}', 'AjaxController@states');
Route::get('ajax/subcategory/{id}', 'AjaxController@subcategory');

Route::get('storage/uploads/{filename}', function ($filename)
{
    $path = storage_path('app/uploads/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

