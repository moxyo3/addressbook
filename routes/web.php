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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'AddressController@showAllAddress');

Auth::routes();

//Login
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'AddressController@createPage');
Route::post('/addAddress', 'AddressController@addAddress');
Route::get('/edit/id='. '{id}', 'AddressController@edit');
Route::post('/update', 'AddressController@update');
Route::post('/delete', 'AddressController@delete');
Route::post('/search', 'AddressController@search');
