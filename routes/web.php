<?php
Route::get('/', 'Main@index');
Route::get('/iniciar-sesion', 'Auth\LoginController@login')->name('iniciar-sesion');
Auth::routes();
Route::get('/opciones-de-usuario', 'Options@index')->name('opciones-de-usuario')->middleware('auth');
Route::get('/lista-usuarios', 'ListaUsuariosController@index')->name('lista-usuarios')->middleware('auth')->middleware('role:Administrador');
Route::post('/lista-usuarios','ListaUsuariosController@search')->name('lista-usuarios')->middleware('auth')->middleware('role:Administrador');
Route::get('/editar-usuario/{cc}', 'ListaUsuariosController@edit')->name('editar-usuario')->middleware('auth')->middleware('role:Administrador')->where(['cc' => '[\d]+']);
Route::post('/actualizar-usuario', 'ListaUsuariosController@update')->name('actualizar-usuario')->middleware('auth')->middleware('role:Administrador');
Route::get('/eliminar-usuario/{cc}', 'ListaUsuariosController@delete')->name('eliminar-usuario')->middleware('auth')->middleware('role:Administrador')->where(['cc' => '[\d]+']);

//Rutas para tipo de informes
Route::middleware(['auth','role:Administrador'])->group(function () {
    Route::get('tipos/informes', 'authenticated\TipoInformeController@index')->name('tipos_informes_lista');
    Route::post('tipos/informes', 'authenticated\TipoInformeController@index')->name('tipos_informes_busqueda');
    Route::get('tipo/informe/{id}/detalle', 'authenticated\TipoInformeController@show')->name('tipo_informe_show');
    Route::get('tipo/informe/registrar', 'authenticated\TipoInformeController@create')->name('tipo_informe_create');
    Route::post('tipo/informe/registrar', 'authenticated\TipoInformeController@store')->name('tipo_informe_store');
    Route::get('tipo/informe/{id}/editar', 'authenticated\TipoInformeController@edit')->name('tipo_informes_edit');
    Route::post('tipo/informe/{id}/editar', 'authenticated\TipoInformeController@update')->name('tipo_informe_update');
});

