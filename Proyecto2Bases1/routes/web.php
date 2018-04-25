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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/CrearProceso','Controller@CrearProceso');
Route::get('/AgregarEtapa','Controller@AgregarEtapa');
Route::get('/AgregarPausa','Controller@AgregarPausa');
Route::get('/AgregarIntegracion','Controller@AgregarIntegracion');
Route::get('/AgregarCondicion/{id}','Controller@AgregarCondicion');
Route::get('/ConfigurarEtapas','Controller@ConfigurarEtapas');