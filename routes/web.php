<?php

Auth::routes();
Auth::routes(['register' => false]);

Route::redirect('/', 'login');
Route::redirect('/index', '/');
Route::redirect('/index.{ext}', '/');

Route::get('/home', 'HomeController@index')->name('home');
