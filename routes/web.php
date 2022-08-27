<?php

use Illuminate\Support\Facades\Route;
use App\Http\Request;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/busreg', function(){
    return view('busreg');
});


Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index']);
Route::get('/create', [App\Http\Controllers\CompanyController::class, 'create']);
Route::post('/company', [App\Http\Controllers\CompanyController::class, 'store']);
Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'show']);
Route::put('/company/{id}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::get('/company/{id}', [App\Http\Controllers\CompanyController::class, 'destroy']);
Route::get('/company/search', [App\Http\Controllers\CompanyController::class, 'search']);