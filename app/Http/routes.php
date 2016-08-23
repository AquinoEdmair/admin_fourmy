<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'UsuarioController@index');


Route::resource('/usuarios', 'UsuarioController');
Route::resource('/servicios', 'ServiciosController');
Route::resource('/proveedores', 'ProveedorController');
Route::resource('/empresas', 'EmpresaController');
Route::resource('/clientes', 'ClienteController');
Route::resource('/servicioscontratados', 'SContratadoController');
Route::get('/usuariocliente/confirmar/{confirmationCode}', 'ClienteController@confirmar');

//Login
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

//Android
Route::post('iniciarsesion', 'MovilController@iniciarSesion');
Route::resource('/usuariocliente', 'ClienteController');
Route::get('obtieneservicios', 'MovilController@obtieneServicios');
Route::post('actualizacliente', 'MovilController@actualizaCliente');
Route::post('actualizaproveedor', 'MovilController@actualizaProveedor');
Route::post('realizarservicio', 'MovilController@realizarServicio');
Route::post('finalizarservicio', 'MovilController@finalizarServicio');
Route::post('cancelarservicio', 'MovilController@cancelarServicio');
Route::post('calificarservicio', 'MovilController@calificarServicio');
Route::post('contratarservicio', 'MovilController@contratarServicio');
Route::post('servicioscontratados', 'MovilController@obtieneServiciosusuario');
Route::post('serviciosproveedor', 'MovilController@obtieneServiciosproveedor');
Route::post('serviciosproveedorhistorial', 'MovilController@obtieneServiciosproveedorhistorial');
//restablecer cuenta de cliente
Route::post('restablecerpassword', 'MovilController@enviarRestablecerPassword');
Route::get('nuevapassword/{token}', 'ClienteController@cambiarRestablecerPassword');
Route::post('cambiarpassword', 'ClienteController@cambiarPassword');
