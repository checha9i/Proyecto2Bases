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

//registerme
Route::get('/register', function () {
    return view('Auth/register');
});


Route::get('/Admin', function () {
    return view('Admin/index-admin');
});




// YOOOOOOOOOOO -----------------------


Route::get('/graficar', function () {
    return view('Graficar/Graficas');
});


Route::get('/CargaUsuario', 'Controller@CargaUsuarios');




// JEJEJEJEJEJEJE




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
//Employment
Route::get('/AddEmployment', function () {
    return view('Admin/AddEmployment');
});
Route::get('/ModifyEmployment', function () {
    return view('Admin/EditEmployment');
});
Route::get('/DropEmployment', function () {
    return view('Admin/DropEmployment');
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



//post
Route::post('/loginme','LoginController@login');
Route::post('/registerme','LoginController@register');

//deletes
Route::get('deleteUser/{id}','Controller@destroyUser') ;
