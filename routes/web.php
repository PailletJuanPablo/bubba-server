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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::post('/custom_login', [App\Http\Controllers\HomeController::class, 'processLogin'])->name('processLogin');
Route::get('/admin_login', [App\Http\Controllers\HomeController::class, 'adminLogin'])->name('adminLogin');



Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('orders', App\Http\Controllers\OrderController::class);


Route::resource('companies', App\Http\Controllers\CompanyController::class);


Route::resource('dniDocuments', App\Http\Controllers\DniDocumentController::class);
