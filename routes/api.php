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
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthorizationController@authenticate');
Route::post('register', 'RegistrationController@register');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('registrations', 'RegistrationController@getRegisteredUsers');
    Route::post('edit-register', 'RegistrationController@UpdateRegister');
    Route::post('reg-delete', 'RegistrationController@DeleteRegister');      
    Route::post('reg-by-id', 'RegistrationController@getRegisteredUserById');
});


