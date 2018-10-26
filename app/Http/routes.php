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

Route::get('/altaempleado','empleado@altaempleado');
Route::POST('/guardaempleado','empleado@guardaempleado')->name('guardaempleado');
Route::get('/reporteempleado','empleado@reporteempleado');

Route::get('/altaproveedor','proveedor@altaproveedor');
Route::POST('/guardaproveedor','proveedor@guardaproveedor')->name('guardaproveedor');
Route::get('/reporteproveedores','proveedor@reporteproveedor');

Route::get('/altamateria','matprima@altamateria');
Route::POST('/guardamateria','matprima@guardamateria')->name('guardamateria');
Route::get('/reportemateria','matprima@reportemateria');

Route::get('/altaresponsable','responsable@altaresponsable');
Route::POST('/guardaresp','responsable@guardaresp')->name('guardaresp');
Route::get('/reporteresps','responsable@reporteresps');

Route::get('/altaempresa','empresa@altaempresa');
Route::POST('/guardarempr','empresa@guardarempr')->name('guardarempr');
Route::get('/reportemp','empresa@reportemp');


Route::get('/altaencargado','encargado@altaencargado');
Route::POST('/guardaenc','encargado@guardaenc')->name('guardaenc');
Route::get('/reportenc','encargado@reportenc');



















