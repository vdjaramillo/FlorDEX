<?php
Route::get('/', 'Main@index');
Route::get('/iniciar-sesion', 'LoginController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
