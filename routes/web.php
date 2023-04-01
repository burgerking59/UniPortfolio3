<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/home/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{pid}', [ProjectController::class, 'show'])->name('projects.show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home/edit/{pid}', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.edit')->middleware('auth');
Route::post('/home/{pid}', [App\Http\Controllers\HomeController::class, 'save'])->name('home.save')->middleware('auth');
Route::get('/home/confirm/{pid}', [App\Http\Controllers\HomeController::class, 'confirm'])->name('home.confirm')->middleware('auth');
Route::delete('/home/{pid}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.delete')->middleware('auth');