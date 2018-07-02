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

Route::match(['get','post'], 'login', 'LoginController@login');
Route::match(['get','post'], 'register', 'LoginController@register');

// Password reset link request routes..
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Password reset routes...
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//Route::match(['get','post'], 'reset_password', 'Auth\ResetPasswordController@showResetForm');



//WITH LOGIN BACKEND
Route::get('logout', 'LoginController@logout');


Route::prefix('adm')->group(function () {
	Route::get('/', 'ProfileController@index');
	
	Route::match(['get','post'], 'profile', 'ProfileController@index');
	Route::match(['get','post'], 'password', 'ProfileController@password');

	//Business..
	Route::get('business', 'BusinessController@index');
	Route::match(['get','post'], 'business/nuevo', 'BusinessController@add');

	Route::get('business/delete/{id}', 'BusinessController@delete');
	Route::match(['get','post'], 'business/editar/{id}', 'BusinessController@edit');

	Route::match(['get','post'], 'business/imagenes/{id}', 'BusinessController@images');
	Route::get('business/imagenes/{id}/delete', 'BusinessController@deleteImages');

	Route::get('business/inactivate/{id}', 'BusinessController@inactivate');
	Route::get('business/activate/{id}', 'BusinessController@activate');
});







/**
 * WITHOUT LOGIN, FRONT END. 
 *
 **/

// GET GENERAL INFORMATION ON FRONTEND
Route::match(['get','post'], 'contacto', 'IndexController@contact'); 



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

