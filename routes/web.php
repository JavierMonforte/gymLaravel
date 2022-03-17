<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SesionController;


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
Route::post('/reservas/sign', [SesionController::class, 'sign']);
Route::post('/reservas/signDias', [SesionController::class, 'signDias']);

Route::get('/search', [App\Http\Controllers\SesionController::class, 'search'])->name('search')->middleware('auth');
Route::get('/reservas', [SesionController::class, 'SolicitarReservas'])->middleware('auth');
Route::get('/reservas/dias', [SesionController::class, 'reservasDia'])->middleware('auth');
Route::get('/reservas/filter', [SesionController::class, 'filter'])->middleware('auth');
Route::get('/reservas/dias/filter', [SesionController::class, 'filter2'])->middleware('auth');

Route::get('/auth/login', [LoginController::class, 'login']);

//Route::resource ('users', UserController::class)->middleware('auth');;
Route::get('users', [UserController::class, 'index'])->middleware('role');
Route::get('users/create', [UserController::class, 'create'])->middleware('role');
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store'])->middleware('auth');
Route::get('users/{id}/edit', [UserController::class, 'edit']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy'])->middleware('auth');

//rutas -> plural
//tablas -> plural
//controladores y modelos -> singular
Route::resource ('activities', ActivityController::class)->middleware('auth');;
// Route::get('activities', [ActivityController::class, 'index']);
// Route::get('activities/create', [ActivityController::class, 'create']);
// Route::get('activities/{id}', [ActivityController::class, 'show']);
// Route::post('activities', [ActivityController::class, 'store']);
// Route::get('activities/{id}/edit', [ActivityController::class, 'edit']);
// Route::put('activities/{id}', [ActivityController::class, 'update']);
// Route::delete('activities/{id}', [ActivityController::class, 'destroy']);

Route::resource ('sesions', SesionController::class)->middleware('auth');
// Route::get('sesions', [ActivityController::class, 'index']);
// Route::get('sesions/create', [ActivityController::class, 'create']);
// Route::get('sesions/{id}', [ActivityController::class, 'show']);
// Route::post('sesions', [ActivityController::class, 'store']);
// Route::get('sesions/{id}/edit', [ActivityController::class, 'edit']);
// Route::put('sesions/{id}', [ActivityController::class, 'update']);
// Route::delete('sesions/{id}', [ActivityController::class, 'destroy']);
//rutas -> plural
//tablas -> plural
//controladores y modelos -> singular

Auth::routes();

//Route::get('/sesions/createAll', [App\Http\Controllers\SesionController::class, 'createAll']);
//Route::post('/storeAll', [App\Http\Controllers\SesionController::class, 'storeAll']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
