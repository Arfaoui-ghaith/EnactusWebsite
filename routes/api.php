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

Route::get('members','MemberController@members');
Route::get('projects','ProjectController@projects');
Route::get('partners','PartnerController@partners');
Route::get('events','EventController@events');
Route::get('brands','BrandController@brands');
Route::get('reparations','ReparationController@reparations');
