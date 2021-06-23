<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'App\Http\Controllers\UsuariosController@inicio');


//obtener usuarios
Route::get('/usuarios', 'App\Http\Controllers\UsuariosController@index');
//para redirigir a la vista de agregar usuario
Route::get('/usuarios/create', 'App\Http\Controllers\UsuariosController@create');
//Route::resource('usuarios','UsuariosController');
//para guardar datos
Route::post('/usuarios','App\Http\Controllers\UsuariosController@store');
//Ruta para obtener los datos de un usuario.
Route::get('/usuarios/{id}', 'App\Http\Controllers\UsuariosController@edit');
//Ruta put para actualizar el usuario seleccionado.
Route::put('/usuarios/{id}', 'App\Http\Controllers\UsuariosController@update');
//Ruta delete para eliminar un usuario.
Route::delete('/usuarios/{id}', 'App\Http\Controllers\UsuariosController@destroy');

//obtener usuarios
Route::get('/reportes', 'App\Http\Controllers\ReportesController@index');
//para redirigir a la vista de agregar usuario
//Route::get('/usuarios/create', 'App\Http\Controllers\UsuariosController@create');
//Route::resource('usuarios','UsuariosController');
//para guardar datos
//Route::post('/usuarios','App\Http\Controllers\UsuariosController@store');
//Ruta para obtener los datos de un usuario.
Route::get('/reportes/{id}', 'App\Http\Controllers\ReportesController@edit');
//Ruta put para actualizar el usuario seleccionado.
Route::put('/reportes/{id}', 'App\Http\Controllers\ReportesController@update');
//Ruta delete para eliminar un usuario.
Route::delete('/reportes/{id}', 'App\Http\Controllers\ReportesController@destroy');



//para guardar datos
Route::post('/notas/{id}','App\Http\Controllers\NotasController@store');

//Ruta delete para eliminar un usuario.
Route::delete('/notas/{id}', 'App\Http\Controllers\NotasController@destroy');

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
