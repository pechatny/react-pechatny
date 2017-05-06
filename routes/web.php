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

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    return 'Test';
});

//Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'api', 'middleware' => 'cors'], function () {
    Route::post("login", "AuthenticateController@authenticate");
    Route::post('/register', 'AuthenticateController@register');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('posts', 'PostController');
        Route::get('userinfo', function () {
            return JWTAuth::parseToken()->authenticate();
        });
    });
});
