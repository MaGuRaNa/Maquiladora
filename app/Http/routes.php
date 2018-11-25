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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function () {
    echo "hola mundo";
});
 
//VISTAS

Route::get('/index','inicio@index');
//Empleado
 Route::get('/altaempleado','empleado@altaempleado');
Route::POST('/guardaempleado','empleado@guardaempleado')->name('guardaempleado');
Route::get('/reporteempleado','empleado@reporteempleado');
Route::get('/modificaempleado/{Id_emp}/','empleado@modificaempleado')->name('modificaempleado');
Route::POST('/editaempleado','empleado@editaempleado')->name('editaempleado');
//Proveedor
Route::get('/altaproveedor','proveedor@altaproveedor');
Route::POST('/guardaproveedor','proveedor@guardaproveedor')->name('guardaproveedor');
Route::get('/reporteproveedores','proveedor@reporteproveedor');
//Materia
Route::get('/altamateria','matprima@altamateria');
Route::POST('/guardamateria','matprima@guardamateria')->name('guardamateria');
Route::get('/reportemateria','matprima@reportemateria');
//Responsable
Route::get('/altaresponsable','responsable@altaresponsable');
Route::POST('/guardaresp','responsable@guardaresp')->name('guardaresp');
Route::get('/reporteresps','responsable@reporteresps')->name('respp');
Route::get('/resp_destro/{id}','responsable@destroy_l')->name('resprest');
Route::get('/resp_destroy/{id}','responsable@destroy_f')->name('respdest');
Route::get('/resp_restore/{id}','responsable@restore');
Route::get('/modificam/{id}','responsable@modificam')->name('modificam');
Route::POST('/editaresp','responsable@editaresp')->name('editaresp');



//Empresa
Route::get('/altaempresa','empresa@altaempresa');
Route::POST('/guardarempr','empresa@guardarempr')->name('guardarempr');
Route::get('/reportemp','empresa@reportemp')->name('repem');
Route::get('/modificamp/{id}','empresa@modificamp')->name('modificamp');
Route::POST('/editaempr','empresa@editaempr')->name('editaempr');

Route::get('/empresa_destro/{id}','empresa@destroy_l')->name('emprest');
Route::get('/empresa_destroy/{id}','empresa@destroy_f')->name('empdest');
Route::get('/empresa_restore/{id}','empresa@restore');

//Encargado Maq
Route::get('/altaencargado','encargado@altaencargado');
Route::POST('/guardaenc','encargado@guardaenc')->name('guardaenc');
Route::get('/reportenc','encargado@reportenc')->name('repemq');
Route::get('/encargado_destro/{id}','encargado@destroy_l')->name('emprest');
Route::get('/encargado_destroy/{id}','encargado@destroy_f')->name('empdest');
Route::get('/encargado_restore/{id}','encargado@restore');
Route::get('/modificame/{id}','encargado@modificame')->name('modificame');
Route::POST('/editae','encargado@editae')->name('editae');




















