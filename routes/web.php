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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@login');

Route::get('register', 'LoginController@register');
Route::post('register', 'LoginController@register');

Route::get('logout', 'LoginController@logout');
Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@index');
Route::get('password', 'ProfileController@password');
Route::post('password', 'ProfileController@password');

//Business..
Route::get('business', 'BusinessController@index');
Route::get('business/delete/{id}', 'BusinessController@delete');
Route::get('business/editar/{id}', 'BusinessController@edit');
Route::post('business/editar/{id}', 'BusinessController@edit');
Route::get('business/imagenes/{id}', 'BusinessController@images');
Route::post('business/imagenes/{id}', 'BusinessController@images');


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

