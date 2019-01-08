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
    return view('auth.login');
});

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('crud',)

//rotas de visualização
Route::get('crud','Crud1Controller@show')->name('crud');
Route::get('cadastro','Crud1Controller@cadastro');
Route::get('/editcrud/{id}','Crud1Controller@editt');

//Rotas de processo
Route::post('addcrud','Crud1Controller@pendejo');
Route::put('upcrud/{id}','Crud1Controller@update');
Route::delete('/delcrud/{id}','Crud1Controller@delete');




//id	name	lastname	age	created_at	updated_at

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
