<?php

use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/inscription')->controller(InscriptionController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/createStudent', 'createStudent')->name('createStudent');
})->name('inscription');

Route::get('/list', [(InscriptionController::class), 'studentsList'])->name('studentsList');
