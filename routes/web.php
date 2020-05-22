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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('member', 'MemberController', ['except' => ['show']]);
});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('brand', 'BrandController');
	});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('BrandTab', 'BrandTabController');
	});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('BrandComputer', 'BrandComputerController');
	
	});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('smartphone', 'SmartphoneController');
	Route::get('/create/{brand}' , 'SmartphoneController@create');
	
	});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('tablette', 'TabletteController');
	Route::get('/createtab/{brandtab}' , 'TabletteController@create');
		
	});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('computer', 'ComputerController');
	Route::get('/createcomputer/{BrandComputer}' , 'ComputerController@create');
			
	});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('Reparation', 'ReparationController');
	Route::get('/IndexReparation/{smartphone}' , 'ReparationController@index');
	Route::get('/CreateReparation/{smartphone}' , 'ReparationController@create');
				
	});





Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

