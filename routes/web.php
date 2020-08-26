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

Route::view('/', 'welcome');
Route::redirect('/index', '/');
Route::redirect('/index.{ext}', '/');

Route::get('api/logins','ProvaController@index')->name('login.test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
