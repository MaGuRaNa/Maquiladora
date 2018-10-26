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

Route::get('/altaresponsable','responsable@altaresponsable');
Route::POST('/guardaresp','responsable@guardaresp')->name('guardaresp');
Route::get('/reporteresps','responsable@reporteresps');

Route::get('/altaempresa','empresa@altaempresa');
Route::POST('/guardarempr','empresa@guardarempr')->name('guardarempr');
Route::get('/reportemp','empresa@reportemp');


Route::get('/altaencargado','encargado@altaencargado');
Route::POST('/guardaenc','encargado@guardaenc')->name('guardaenc');
Route::get('/reportenc','encargado@reportenc');



















