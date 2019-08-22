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
    Route::get('tipo/informe/{id}/detalle', 'authenticated\TipoInformeController@show')->name('tipo_informe_show')->where('id', '[0-9]+');;
    Route::get('tipo/informe/registrar', 'authenticated\TipoInformeController@create')->name('tipo_informe_create');
    Route::post('tipo/informe/registrar', 'authenticated\TipoInformeController@store')->name('tipo_informe_store');
    Route::get('tipo/informe/{id}/editar', 'authenticated\TipoInformeController@edit')->name('tipo_informes_edit')->where('id', '[0-9]+');;
    Route::post('tipo/informe/{id}/editar', 'authenticated\TipoInformeController@update')->name('tipo_informe_update')->where('id', '[0-9]+');;
    Route::get('tipos/informes/{id}/eliminar', 'authenticated\TipoInformeController@destroy')->name('tipo_informe_delete')->where('id', '[0-9]+');;


});
//Ruta para creacion dex
Route::post('dex/crear','authenticated\DEXController@crear')->name('crear-dex')->middleware(['auth','role:Encargado Logistica']);
//Ruta para tesorero
Route::middleware(['auth','role:Tesorero'])->group(function () {
    Route::get('dex/listar','authenticated\DEXController@listar')->name('listar-dex');
    Route::get('dex/ver/{dex}','authenticated\DEXController@ver')->name('ver-dex');
    Route::post('dex/editar/{dex}','authenticated\DEXController@legalizar')->name('editar-dex');
    Route::post('dex/buscar','authenticated\DEXController@buscar')->name('buscar-dex');
});

Route::post('dex/generar/informe','authenticated\InformeController@generarInforme')->name('generar');
//Ruta para contador

Route::middleware(['auth','role:Contador'])->group(function () {
    Route::get('dex/listar2','authenticated\DEXController@listar')->name('listar-dex2');
    Route::get('dex/ver2/{dex}','authenticated\DEXController@ver')->name('ver-dex2');
    Route::post('dex/editar2/{dex}','authenticated\DEXController@editar')->name('editar-dex2');
    Route::post('dex/buscar2','authenticated\DEXController@buscar')->name('buscar-dex2');
});
