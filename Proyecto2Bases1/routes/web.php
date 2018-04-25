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


//loginme
Route::get('/login', function () {
    return view('Auth/login');
});
//Condicion
Route::get('/AddCondicion', function () {
    return view('Usuarios/AddCondicion');
});
Route::get('/ModifyCondicion', function () {
    return view('Usuarios/EditCondicion');
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
    return view('Admin/EditProcess');
});
Route::get('/DropProcess', function () {
    return view('Admin/DropProcess');
});
//Document
Route::get('/AddDocument', function () {
    return view('Admin/AddDocument');
});
Route::get('/ModifyDocument', function () {
    return view('Admin/EditDocument');
});
Route::get('/DropDocument', function () {
    return view('Admin/DropDocument');
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
    return view('Admin/AddActivity');
});
Route::get('/ModifyActivity', function () {
    return view('Admin/EditActivity');
});
Route::get('/DropActivity', function () {
    return view('Admin/DropActivity');
});

Route::get('/Usuarios', function () {
    return view('Usuarios/Usuarios');
});


//post
Route::post('/loginme','LoginController@login');
Route::post('/registerme','LoginController@register');
Route::post('/AddCondition','Controller@AddCondicion');

//deletes
Route::get('deleteUser/{id}','Controller@destroyUser') ;
