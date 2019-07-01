<?php
Route::get('/', 'Main@index');
Route::get('/iniciar-sesion', 'Auth\LoginController@login')->name('iniciar-sesion');
Auth::routes();
Route::get('usuario/opciones', 'Options@index')->name('opciones-de-usuario')->middleware('auth');

//Rutas para Administrador
Route::middleware(['auth','role:Administrador'])->group(function () {
    //Rutas para usuarios
    Route::get('usuario/lista', 'authenticated\ListaUsuariosController@index')->name('lista-usuarios');
    Route::post('usuario/lista','authenticated\ListaUsuariosController@search')->name('lista-usuarios');
    Route::get('usuario/editar/{cc}', 'authenticated\ListaUsuariosController@edit')->name('editar-usuario')->where(['cc' => '[\d]+']);
    Route::post('usuario/actualizar', 'authenticated\ListaUsuariosController@update')->name('actualizar-usuario');
    Route::get('usuario/eliminar/{cc}', 'authenticated\ListaUsuariosController@delete')->name('eliminar-usuario')->where(['cc' => '[\d]+']);

    //Rutas para tipo de informes
    Route::get('tipos/informes', 'authenticated\TipoInformeController@index')->name('tipos_informes_lista');
    Route::post('tipos/informes', 'authenticated\TipoInformeController@index')->name('tipos_informes_busqueda');
    Route::get('tipo/informe/{id}/detalle', 'authenticated\TipoInformeController@show')->name('tipo_informe_show');
    Route::get('tipo/informe/registrar', 'authenticated\TipoInformeController@create')->name('tipo_informe_create');
    Route::post('tipo/informe/registrar', 'authenticated\TipoInformeController@store')->name('tipo_informe_store');
    Route::get('tipo/informe/{id}/editar', 'authenticated\TipoInformeController@edit')->name('tipo_informes_edit');
    Route::post('tipo/informe/{id}/editar', 'authenticated\TipoInformeController@update')->name('tipo_informe_update');
});

