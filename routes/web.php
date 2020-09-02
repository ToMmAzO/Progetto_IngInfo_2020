<?php

Auth::routes();
Auth::routes(['register' => false]);

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::redirect('/', 'login');
Route::redirect('/index', '/');
Route::redirect('/index.{ext}', '/');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rooms', 'RoomsController@index')->name('rooms');

Route::get('/room/{id}', 'RoomController@index');
Route::get('/room', function() {
    return redirect('/home');
});

Route::get('/charts/{id}', 'ChartsController@index');
Route::get('/charts', function() {
    return redirect('/home');
});

Route::get('/api/data/charts', 'ChartsDataController@index');
