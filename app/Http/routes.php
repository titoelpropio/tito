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


//categoria
Route::resource('categoria','CategoriaController');
Route::get('listacategoria','CategoriaController@listacategoria');

//gestion
Route::resource('gestion','GestionController');
//Route::post('desactivar_gestion','GestionController@desactivar_gestion');
Route::get('desactivar_gestion/{id}/{numero}','GestionController@desactivar_gestion');

//depreciasiones
Route::resource('depreciacion','DepreciacionController');


//asiento
Route::get('asiento/{id}','AsientoController@index');
Route::get('lista_asiento','AsientoController@lista_asiento');
Route::resource('asiento','AsientoController');

//moneda
Route::resource('moneda','MonedaController');

//login
Route::resource('/','LoginController');
Route::resource('login','LoginController@store');
Route::get('logout','LoginController@logout');

//cuenta
Route::resource('cuenta','CuentaController');
Route::resource('plan_cuenta','CuentaController@plan_cuenta');
//route
Route::resource('/','LoginController');
//detalle
Route::resource('detalle','Detallecontroller');

//extrar codigo
Route::get('extraercodigo','CuentaController@extraercodigo');

//usuario
Route::resource('usuario','UsuarioController');
//empresa
Route::resource('empresa','EmpresaController');

//reportes de los balances
Route::get('reporte_libro_diario/{fecha1}/{fecha2}','ReportesController@reporte_libro_diario');
Route::get('reporte_libro_mayor/{fecha1}/{fecha2}','ReportesController@reporte_libro_mayor');
Route::get('reporte_estado_resultado/{fecha1}/{fecha2}','ReportesController@reporte_estado_resultado');
//formularios reportes
Route::get('libro_mayor','ReportesController@libro_mayor');
Route::resource('libro_diario','ReportesController@libro_diario');
Route::resource('sumas_saldos','ReportesController@sumas_saldos');
Route::resource('estado_resultado','ReportesController@estado_resultado');
