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


Route::get('login', 'AdminController@login')->name('login');
Route::post('login', 'AdminController@Autenticacion')->name('loguear');
Route::get('logout','AdminController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'AdminController@index')->name('home');//index

    Route::get('procesos', 'ProcesoController@index')->name('procesos');
    Route::get('procesos/listar', 'ProcesoController@listar')->name('procesos.listar');
    Route::post('procesos/save', 'ProcesoController@save')->name('procesos.save');
    Route::get('procesos/eliminar/{id}', 'ProcesoController@delete');
    Route::get('procesos/get/{id}', 'ProcesoController@get');
    
    
    Route::get('tipos', 'TiposController@index')->name('tipos');
    Route::get('tipos/listar', 'TiposController@listar')->name('tipos.listar');
    Route::get('tipos/dt/listar', 'TiposController@listarDataT')->name('tipos.dt.listar');
    Route::post('tipos/ave', 'TiposController@save')->name('tipos.save');
    Route::get('tipos/eliminar/{id}', 'TiposController@delete');
    Route::get('tipos/get/{id}', 'TiposController@get');
    
    Route::get('estados', 'EstadosController@index')->name('estados');
    Route::get('estados/listar', 'EstadosController@listar')->name('estados.listar');
    Route::get('estados/dt/listar', 'EstadosController@listarDataT')->name('estados.dt.listar');
    Route::post('estados/save', 'EstadosController@save')->name('estados.save');
    Route::get('estados/eliminar/{id}', 'EstadosController@delete');
    Route::get('estados/get/{id}', 'EstadosController@get');
    
    Route::get('us', 'UsersController@index')->name('us');
    Route::get('us/listar', 'UsersController@listar')->name('us.listar');
    Route::get('us/dt/listar', 'UsersController@listarDataT')->name('us.dt.listar');
    Route::post('us/save', 'UsersController@save')->name('us.save');
    Route::get('us/baja/{id}', 'UsersController@baja');
    Route::get('us/get/{id}', 'UsersController@get');

    Route::get('modulos', 'ModulosController@index')->name('modulos');
    Route::get('modulos/listar', 'ModulosController@listar')->name('modulos.listar');
    Route::get('modulos/dt/listar', 'ModulosController@listarDataT')->name('modulos.dt.listar');
    Route::post('modulos/save', 'ModulosController@save')->name('modulos.save');
    Route::get('modulos/baja/{id}', 'ModulosController@baja');
    Route::get('modulos/get/{id}', 'ModulosController@get');

    Route::get('configuraciones', 'ConfiguracionesController@index')->name('configuraciones');
    Route::get('configuraciones/listar', 'ConfiguracionesController@listar')->name('configuraciones.listar');
    Route::get('configuraciones/dt/listar', 'ConfiguracionesController@listarDataT')->name('configuraciones.dt.listar');
    Route::post('configuraciones/save', 'ConfiguracionesController@save')->name('configuraciones.save');
    Route::get('configuraciones/baja/{id}', 'ConfiguracionesController@baja');
    Route::get('configuraciones/get/{id}', 'ConfiguracionesController@get');

    Route::get('proveedor/solicitudes', 'ProveedoresController@SolicitudesIndex')->name('solprov');
    Route::get('proveedor/solicitudes/dt/listar', 'ProveedoresController@SolicitudesListarDataT')->name('solprov.dt.listar');
    Route::post('proveedor/solicitudes/save', 'ProveedoresController@SolicitudesSave')->name('solprov.save');
    Route::get('proveedor/solicitudes/get/{id}', 'ProveedoresController@SolicitudesGet');
    Route::get('proveedor', 'ProveedoresController@index')->name('proveedores');
    //Route::get('proveedor/listar', 'Configu6racionesController@listar')->name('configuraciones.listar');
    Route::get('proveedor/dt/listar', 'ProveedoresController@listarDataT')->name('proveedores.dt.listar');
    Route::post('proveedor/save', 'ProveedoresController@save')->name('proveedores.save');
    Route::get('proveedor/get/{id}', 'ProveedoresController@get');

    Route::get('choferes/solicitudes', 'ChoferesController@SolicitudesIndex')->name('solchof');
    Route::get('choferes/solicitudes/dt/listar', 'ChoferesController@SolicitudesListarDataT')->name('solchof.dt.listar');
    Route::post('choferes/solicitudes/save', 'ChoferesController@SolicitudesSave')->name('solchof.save');
    Route::get('choferes/solicitudes/get/{id}', 'ChoferesController@SolicitudesGet');
    Route::get('choferes', 'ChoferesController@index')->name('choferes');
    //Route::get('proveedor/listar', 'ConfiguracionesController@listar')->name('configuraciones.listar');
    Route::get('choferes/dt/listar', 'ChoferesController@listarDataT')->name('choferes.dt.listar');
    Route::post('choferes/save', 'ChoferesController@save')->name('choferes.save');
    Route::get('choferes/get/{id}', 'ChoferesController@get');

    Route::get('productos', 'ProductosController@index')->name('productos');
    Route::get('productos/listar', 'ProductosController@listar')->name('productos.listar');
    Route::get('productos/dt/listar', 'ProductosController@listarDataT')->name('productos.dt.listar');
    Route::post('productos/save', 'ProductosController@save')->name('productos.save');
    Route::get('productos/baja/{id}', 'ProductosController@baja');
    Route::get('productos/get/{id}', 'ProductosController@get');







});


