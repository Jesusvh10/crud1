<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('user', 'AuthController@user');

});


Route::group(['middleware' => 'auth:api'], function() {

    //Route::get('user', 'AuthController@user');
    Route::post('register', 'AuthController@signup');
    Route::post('store', 'AuthController@store');
    Route::get('show/{id}', 'AuthController@show');
    Route::post('update/{id}','AuthController@update');
    Route::post('delete/{id}','AuthController@delete');

});

