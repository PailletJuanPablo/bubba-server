<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', UserAPIController::class);


Route::resource('orders', OrderAPIController::class);


Route::resource('companies', CompanyAPIController::class);


Route::post('/login', [App\Http\Controllers\API\UserAPIController::class, 'login'])->name('api.login');


Route::resource('dni_documents', App\Http\Controllers\API\DniDocumentAPIController::class);
Route::get('/get_dni_data/{dni}', [App\Http\Controllers\API\OrderAPIController::class, 'getDniData'])->name('api.getDniData');