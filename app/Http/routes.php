<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

// Маршруты аутентификации...


Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'auth.login'
]);

Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'auth.logout'
]);


// Маршруты регистрации...

Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'auth.register'
]);

Route::post('register', [
    'uses' => 'Auth\AuthController@postRegister',
]);





