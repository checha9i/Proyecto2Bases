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


//get

Route::get('/', function () {
    return view('welcome');
});

Route::get('/CrearProceso','Controller@CrearProceso');
Route::get('/AgregarEtapa','Controller@AgregarEtapa');
Route::get('/AgregarPausa','Controller@AgregarPausa');
Route::get('/AgregarIntegracion','Controller@AgregarIntegracion');
Route::get('/AgregarCondicion/{id}','Controller@AgregarCondicion');
Route::get('/ConfigurarEtapas','Controller@ConfigurarEtapas');
Route::get('/AgregarDetalleIntegracion/{id}','Controller@AgregarDetalleIntegracion');
Route::get('/saber/{id}','Controller@saber');

//loginme
Route::get('/login', function () {
    return view('Auth/login');
});
//Condicion
Route::get('/AddCondicion', function () {
    return view('Usuarios/AddCondicion');
});

Route::get('/DropCondicion', function () {
    return view('Usuarios/DropCondicion');
});
//registerme
Route::get('/register', function () {
    return view('Auth/register');
});


Route::get('/Admin', function () {
    return view('Admin/index-admin');
});

//User
Route::get('/AddUser', function () {
    return view('Admin/AddUser');
});
Route::get('/ModifyUser', function () {
    return view('Admin/EditUser');
});
Route::get('/DropUser', function () {
    return view('Admin/DropUser');
});
//Process
Route::get('/AddProcess', function () {
    return view('Admin/AddProcess');
});
Route::get('/ModifyProcess', function () {
    return view('Usuarios/EditProcess');
});
Route::get('/DropProcess', function () {
    return view('Usuarios/DropProcess');
});
//Document
Route::get('/AddDocument', function () {
    return view('Usuarios/AddDocument');
});
Route::get('/ModifyDocument', function () {
    return view('Usuarios/EditDocument');
});
Route::get('/DropDocument', function () {
    return view('Usuarios/DropDocument');
});
//Flow
Route::get('/AddFlow', function () {
    return view('Admin/AddFlow');
});
Route::get('/ModifyFlow', function () {
    return view('Admin/EditFlow');
});
Route::get('/DropFlow', function () {
    return view('Admin/DropFlow');
});

//Activity
Route::get('/AddActivity', function () {
    return view('Usuarios/AddActivity');
});
Route::get('/ModifyActivity', function () {
    return view('Usuarios/EditActivity');
});
Route::get('/DropActivity', function () {
    return view('Usuarios/DropActivity');
});

//Gestion
Route::get('/AddGestion', function () {
    return view('Usuarios/AddGestion');
});
Route::get('/ModifyGestion', function () {
    return view('Usuarios/EditGestion');
});
Route::get('/DropGestion', function () {
    return view('Usuarios/DropGestion');
});
Route::get('/Usuarios', function () {
    return view('Usuarios/Usuarios');
});
Route::get('/Reporte1', function () {
    return view('Reportes/Reporte1');
});
Route::get('/Reporte2', function () {
    return view('Reportes/Reporte2');
});

Route::get('/Reportea2', function () {
    return view('Reportes/Reportea2');
});
Route::get('/Reporte3', function () {
    return view('Reportes/Reporte3');
});
Route::get('/Reportea3', function () {
    return view('Reportes/Reportea3');
});
Route::get('/Reporte4', function () {
    return view('Reportes/Reporte4');
});
Route::get('/Reporte5', function () {
    return view('Reportes/Reporte5');
});

Route::get('/Reportea5', function () {
    return view('Reportes/Reportea5');
});
Route::get('/Reporte6', function () {
    return view('Reportes/Reporte6');
});
Route::get('/Reportea6', function () {
    return view('Reportes/Reportea6');
});
Route::get('/Reporte7', function () {
    return view('Reportes/Reporte7');
});
Route::get('/Reporte8', function () {
    return view('Reportes/Reporte8');
});
Route::get('/Reportea8', function () {
    return view('Reportes/Reportea8');
});
Route::get('/Reporte9', function () {
    return view('Reportes/Reporte9');
});
Route::get('/Reporte10', function () {
    return view('Reportes/Reporte10');
});
Route::get('/Reporte11', function () {
    return view('Reportes/Reporte11');
});
Route::get('/Reporte12', function () {
    return view('Reportes/Reporte12');
});
Route::get('/Reportea12', function () {
    return view('Reportes/Reportea12');
});

Route::get('/Notificacion', function () {
    return view('Usuarios/MostrarNotificacion');
});

//notificaciones
Route::get('mostrarnotificacion/{id}','Controller@mostrarnotificacion') ;

//post

Route::post('/detalleetapa','Controller@detalleetapacondicion1');
Route::post('/loginme','LoginController@login');
Route::post('/registerme','LoginController@register');
Route::post('/AddCondition','Controller@AddCondicion');
Route::post('/AnadirGestion','Controller@AnadirGestion');
Route::post('/AnadirDocumento','Controller@AnadirDocumento');
Route::post('/AnadirActividad','Controller@AnadirActividad');
//deletes
Route::get('deleteUser/{id}','Controller@destroyUser') ;
Route::get('deleteCondicion/{id}','Controller@destroyCondicion') ;
Route::get('deleteProceso/{id}','Controller@destroyProceso') ;
Route::get('deleteGestion/{id}','Controller@destroyGestion') ;

//Edit
Route::get('/ModifyCondicion', function () {
    return view('Usuarios/EditCondicion');
});
Route::get('/ModifyCondicion1', function () {
    return view('Usuarios/EditCondicion1');
});
Route::get('/editCondicion/{id}','Controller@modifyCondicion') ;
Route::post('/actualizarCondicion','Controller@actualizarCondicion');

Route::post('/consulta2','Controller@consulta2');
Route::post('/consulta3','Controller@consulta3');
Route::post('/consulta5','Controller@consulta5');
Route::post('/consulta6','Controller@consulta6');
Route::post('/consulta8','Controller@consulta8');
Route::post('/consulta12','Controller@consulta12');
