<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;


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
Route::get('/welcome', function(){
    return view('welcome');
});

// Company routes for customers

Route::get('/welcome', [App\Http\Controllers\CompanyController::class, 'index']);
Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index']);
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->middleware('auth');
Route::post('/company', [App\Http\Controllers\CompanyController::class, 'store']);
Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->middleware('auth');
Route::put('/company/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->middleware('auth');
Route::get('/company/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->middleware('role:admin');
Route::get('/company/show/{id}', [App\Http\Controllers\CompanyController::class, 'display']); //for display company information
Route::get('/company/search', [App\Http\Controllers\CompanyController::class, 'search']);


Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth'); //for display profile information

