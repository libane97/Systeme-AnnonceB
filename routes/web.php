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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* les annonces */
Route::get('/annonce','AdController@index')->name('index.ad');
Route::get('/createAnnonce', 'AdController@create')->name('create.ad');
Route::post('/createAnnonce', 'AdController@store')->name('store.ad');
Route::post('/searchAnnonce', 'AdController@search')->name('ad.search');

