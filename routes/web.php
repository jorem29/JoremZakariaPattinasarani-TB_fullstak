<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BarangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ViewController::class,'login'])->name('login');
Route::get('/register', [ViewController::class,'register'])->name('register');
Route::get('/logout', [ViewController::class,'logout'])->name('logout');

Route::get('/dashboard', [ViewController::class,'dashboard'])->name('dashboard');

//barang
Route::get('/barang-index',[BarangController::class,'index']);
Route::get('/barang-create',[BarangController::class,'tambah']);
Route::get('/barang/{id}/edit',[BarangController::class,'edit']);

//Outlet
Route::get('/outlet-index',[BarangController::class,'indexOutlet']);
Route::get('/outlet-create',[BarangController::class,'tambahOutlet']);
Route::get('/outlet/{id}/edit',[BarangController::class,'editOutlet']);

//survey
Route::get('/survey-index',[BarangController::class,'survey']);


// Route::group(['middleware' => ['auth', 'role:admin']], function() {
//     Route::get('/dashboard', [ViewController::class,'dashboard'])->name('dashboard');

//     //barang
//     Route::get('/barang-index',[BarangController::class,'index']);
//     Route::get('/barang-create',[BarangController::class,'tambah']);
//     Route::get('/barang/{id}/edit',[BarangController::class,'edit']);

//     //Outlet
//     Route::get('/outlet-index',[BarangController::class,'indexOutlet']);
//     Route::get('/outlet-create',[BarangController::class,'tambahOutlet']);
//     Route::get('/outlet/{id}/edit',[BarangController::class,'editOutlet']);

//     //survey
//     Route::get('/survey-index',[BarangController::class,'survey']);
// });