<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//auth()->logInUsingId(1); // laikinai
Route::localizedGroup(function () {

// Route::group([
//     'prefix' => Localization::setLocale(),
//     'middleware' => [
//         'localization-session-redirect',
//         'localization-redirect',
//     ],
// ], function() {

Route::get('', 'PagesController@index');

Route::get('/naujienos', 'NewsController@frontIndex');
Route::get('/naujiena/{slug}', 'NewsController@show');

Route::get('/audiniai', 'FabricsController@frontIndex');

Route::get('/audiniai/{slug}', 'FabricsController@frontCategoryIndex');


Route::get('/tapetai', 'WallpapersController@frontIndex');

Route::get('/tapetai/{slug}', 'WallpapersController@frontCategoryIndex');

Route::get('/parketlentes', 'FlooringController@frontIndex');

Route::get('/parketlentes/{slug}', 'FlooringController@frontCategoryIndex');


// Route::get('/aksesuarai', function(){
// 	return view('pages.aksesuarai');
// });

Route::get('/aksesuarai', 'AccessoriesController@frontIndex');

Route::get('/kontaktai', function(){
    return view('pages.kontaktai');
});

Route::get('/naujiena', function(){
    return view('pages.naujiena');
});


Route::post('/contact-form', 'ContactsController@store');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', function(){
    Auth::logout();
    return redirect('/');
});
Route::post('logout', 'Auth\LoginController@logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group([
    'prefix' => '/admin',
    'middleware'=> 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('/news', 'NewsController');

    Route::get('/nav-photos/news', 'NavPhotosController@news');
    Route::put('/nav-images/news/{id}', 'NavPhotosController@postNews');

    Route::get('/nav-photos/wallpapers', 'NavPhotosController@wallpapers');
    Route::put('/nav-images/wallpapers/{id}', 'NavPhotosController@postWallpapers');

    Route::get('/nav-photos/fabrics', 'NavPhotosController@fabrics');
    Route::put('/nav-images/fabrics/{id}', 'NavPhotosController@postFabrics');

    Route::get('/nav-photos/flooring', 'NavPhotosController@flooring');
    Route::put('/nav-images/flooring/{id}', 'NavPhotosController@postFlooring');

    Route::get('/nav-photos/accessories', 'NavPhotosController@accessories');
    Route::put('/nav-images/accessories/{id}', 'NavPhotosController@postAccessories');

    Route::get('/nav-photos/contacts', 'NavPhotosController@contacts');
    Route::put('/nav-images/contacts/{id}', 'NavPhotosController@postContacts');

    Route::resource('/wallpapers/categories', 'WallpaperCategoriesController');
    Route::resource('/wallpapers', 'WallpapersController');

    Route::resource('/flooring/categories', 'FlooringCategoriesController');
    Route::resource('/flooring', 'FlooringController');

    Route::get('/accessories/edit','AccessoriesController@edit');
    Route::resource('/accessories', 'AccessoriesController');

    Route::resource('/fabrics/categories', 'FabricsCategoriesController');
    Route::resource('/fabrics', 'FabricsController');
});



