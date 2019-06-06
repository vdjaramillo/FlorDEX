<?php
Route::get('/', 'Main@index');
Route::get('/iniciar-sesion', 'Auth\LoginController@login')->name('iniciar-sesion');
Auth::routes();
Route::get('/opciones-de-usuario', 'Options@index')->name('opciones-de-usuario')->middleware('auth');