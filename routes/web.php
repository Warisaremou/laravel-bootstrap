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
    return view('infoDEC');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/inscription')->controller(InscriptionController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/createStudent', 'createStudent')->name('createStudent');
    Route::get('/{etudiant}/edit', 'editStudentForm')->name('editStudentForm');
    Route::patch('/{etudiant}/edit', 'editStudent')->name('editStudent');
})->name('inscription');

Route::get('/list', [(InscriptionController::class), 'studentsList'])->name('studentsList');
Route::get('/search', [(InscriptionController::class), 'findStudentByOption'])->name('findStudentByOption');
Route::delete('/student/{studentID}/delete', [(InscriptionController::class), 'deleteStudent'])->name('deleteStudent');
