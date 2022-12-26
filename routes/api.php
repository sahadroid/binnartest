<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/



//Route::resource('/users', UsersController::class);


// ROUTE USER
Route::post('users', 'UsersController@store');
Route::post('users/login', 'UsersController@login');
Route::get('users/{id?}', 'UsersController@show');
Route::put('users/{id?}', 'UsersController@update');
Route::delete('users/{id?}', 'UsersController@destroy');



// ROUTE SPORTEVENTS
Route::get('sportevents', 'SportEventsController@index');
Route::post('sportevents', 'SportEventsController@store');
Route::get('sportevents/{id?}', 'SportEventsController@show');
Route::put('sportevents/{id?}', 'SportEventsController@update');
Route::delete('sportevents/{id?}', 'SportEventsController@destroy');


// ROUTE ORGANIZERS
Route::get('organizers', 'OrganizersController@index');
Route::post('organizers', 'OrganizersController@store');
Route::get('organizers/{id?}', 'OrganizersController@show');
Route::put('organizers/{id?}', 'OrganizersController@update');
Route::delete('organizers/{id?}', 'OrganizersController@destroy');

