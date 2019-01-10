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

Route::get('about', 'Front\UserController@about');
Route::get('contact', 'Front\UserController@contact');
Route::get('login', 'Front\UserController@login');
Route::get('register', 'Front\UserController@register');
Route::match(['get', 'post'], 'doregister', 'Front\UserController@doRegister');
Route::match(['get', 'post'], 'dologin', 'Front\UserController@doLogin');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
