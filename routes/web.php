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

//Route::get('/', function () {
 //  return view('welcome');
//});
//Route::get('/',[\App\Http\Controllers\DashController::class,'index']);

Route::middleware(['auth'])->group(function(){
Route::get('/',[App\Http\Controllers\HomeController::class,'index']);
Route::get('/riwayat',[App\Http\Controllers\HomeController::class,'riwayat_transaksi']);
Route::get('/1',[App\Http\Controllers\HomeController::class,'dashboard']);
Route::get('/admin/datawarga',[App\Http\Controllers\HomeController::class,'datawarga'])->name('warga.data');
Route::get('/admin/insert-data',[App\Http\Controllers\HomeController::class,'create']);

Route::post('/admin/datawarga',[App\Http\Controllers\HomeController::class,'store'])->name('warga.insert');
Route::post('/admin/update-data/{id}',[App\Http\Controllers\HomeController::class,'update'])->name('warga.update');
Route::get('/admin/delete-data/{id}',[App\Http\Controllers\HomeController::class,'destroy']);

//Route::get('/admin/edit/{id}/',[App\Http\Controllers\HomeController::class,'ubah']);

Route::get('/admin/edit-data/{id}/',[App\Http\Controllers\HomeController::class,'edit'])->name('edit');

//Route::get('/admin/datawarga/create', [HomeController::class, 'create'])->name('datawarga.create');
////

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');
