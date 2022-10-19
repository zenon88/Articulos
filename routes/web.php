<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home1',[App\Http\Controllers\HomeController::class,'consulta_art'])->name('home1');
Route::get('/clases',[App\Http\Controllers\HomeController::class,'consulta_clase'])->name('clases');
Route::get('/familias',[App\Http\Controllers\HomeController::class,'consulta_familia'])->name('familias');
Route::get('/addarticulos',[App\Http\Controllers\HomeController::class,'add_articulos'])->name('addarticulos');
Route::get('/updatearticulos',[App\Http\Controllers\HomeController::class,'update_articulos'])->name('updatearticulos');
Route::get('/deletearticulos',[App\Http\Controllers\HomeController::class,'delete_articulos'])->name('deletearticulos');