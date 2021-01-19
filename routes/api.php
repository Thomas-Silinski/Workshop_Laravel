<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ImmeubleController;



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

Route::group([

    'middleware' => 'api'

], function ($router) {

    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('/refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::get('/me', 'App\Http\Controllers\AuthController@me');
    Route::post('/register/users', 'App\Http\Controllers\UserController@saveUser');

});



// Partie User
Route::get('/all/users', 'App\Http\Controllers\UserController@getUser');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@getUserById');
Route::patch('/up/users/{id}', 'App\Http\Controllers\UserController@upUser');
Route::delete('/delete/users/{id}', 'App\Http\Controllers\UserController@deleteUser');



// Partie Account
Route::get('/all/accounts', 'App\Http\Controllers\AccountController@getAccount');
Route::post('/register/accounts', 'App\Http\Controllers\AccountController@saveAccount');
Route::get('/immeuble/user/accounts/{id}', 'App\Http\Controllers\AccountController@getImmeubleByUserId');
Route::get('/{id}/accounts', 'App\Http\Controllers\AccountController@getAccountById');
Route::patch('/up/accounts/{id}', 'App\Http\Controllers\AccountController@upAccount');
Route::delete('/delete/accounts/{id}', 'App\Http\Controllers\AccountController@deleteAccount');



// Partie Immeuble
Route::post('/register/immeubles', 'App\Http\Controllers\ImmeubleController@saveImmeuble');
Route::get('/all/immeubles', 'App\Http\Controllers\ImmeubleController@getImmeuble');
Route::get('/immeubles/{id}', 'App\Http\Controllers\ImmeubleController@getImmeubleById');
Route::patch('/up/immeubles/{id}', 'App\Http\Controllers\ImmeubleController@upImmeuble');
Route::delete('/delete/immeubles/{id}', 'App\Http\Controllers\ImmeubleController@deleteImmeuble');