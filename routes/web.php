<?php
Route::get('/', 'Main@index');
Route::get('/iniciar-sesion', 'Auth\LoginController@login')->name('iniciar-sesion');
Auth::routes();
Route::get('/opciones-de-usuario', 'Options@index')->name('opciones-de-usuario')->middleware('auth');
Route::get('/lista-usuarios', 'ListaUsuariosController@index')->name('lista-usuarios')->middleware('auth')->middleware('role:Administrador');
Route::get('/editar-usuario/{cc}', 'ListaUsuariosController@edit')->name('editar-usuario')->middleware('auth')->middleware('role:Administrador')->where(['cc' => '[\d]+']);
Route::post('/actualizar-usuario', 'ListaUsuariosController@update')->name('actualizar-usuario')->middleware('auth')->middleware('role:Administrador');
Route::post('/eliminar-usuario', 'ListaUsuariosController@delete')->name('eliminar-usuario')->middleware('auth')->middleware('role:Administrador');