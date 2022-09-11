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


Auth::routes();


// Home routes
Route::get('/', function () {
    return view('home');
});
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


// Company routes for admin

Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->middleware('auth')->name('company.create');
Route::post('/company', [App\Http\Controllers\CompanyController::class, 'store'])->name('company')->name('company.store');
Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->middleware('auth')->name('company.edit');
Route::put('/company/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->middleware('auth');
Route::get('/company/delete/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->middleware('auth')->name('company.delete');
Route::get('/company/show/{id}', [App\Http\Controllers\CompanyController::class, 'display'])->name('company.show'); //for display company information
Route::get('/company/search', [App\Http\Controllers\CompanyController::class, 'search']);
Route::get('/company/status/{id}', [App\Http\Controllers\CompanyController::class, 'status'])->middleware('auth')->name('company.status');
Route::put('/updatestatus/{id}', [App\Http\Controllers\CompanyController::class, 'updatestatus'])->middleware('auth');

// User routes for 

Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth')->name('profile'); //for display profile information
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('auth'); //  
Route::get('/user/company/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth')->name('user.company');
Route::get('/users/company/create', [App\Http\Controllers\UserController::class, 'create'])->middleware('auth')->name('users.company.create');
Route::post('/user/company/create', [App\Http\Controllers\UserController::class, 'store'])->middleware('auth');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'update'])->middleware('auth');


// Admin routes

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth'); //

