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
    return view('front.home');
});

Route::middleware(['custom.check_login'])->group(function() {
    Route::get('about', 'Front\UserController@about');
    Route::get('contact', 'Front\UserController@contact');
});

Route::get('login', 'Front\UserController@login');
Route::get('logout', 'Front\UserController@logout');
Route::get('register', 'Front\UserController@register');
Route::match(['get', 'post'], 'doregister', 'Front\UserController@doRegister');
Route::match(['get', 'post'], 'dologin', 'Front\UserController@doLogin');


