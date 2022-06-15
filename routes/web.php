<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'admin'], function () {
    Route::post('login', 'AuthorizationController@authenticate');
    Route::get('registrations', 'RegistrationController@getRegisteredUsers');
    Route::post('register', 'RegistrationController@register');
    Route::post('edit-register', 'RegistrationController@UpdateRegister');
    Route::get('reg-delete', 'RegistrationController@DeleteRegister');      
});
    
Route::any('/{page?}',function(){
    return View::make('404');
   })->where('page','.*');
