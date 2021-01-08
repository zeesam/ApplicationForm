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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/personal/index', [App\Http\Controllers\PersonalController::class, 'index']);
Route::post('/personal/store', [App\Http\Controllers\PersonalController::class, 'store']);
Route::get('/personal/edit/{id}', [App\Http\Controllers\PersonalController::class, 'edit']);
Route::post('/personal/update/{id}', [App\Http\Controllers\PersonalController::class, 'update']);

Route::get('/academic/index', [App\Http\Controllers\AcademicController::class, 'index']);
Route::post('/academic/store', [App\Http\Controllers\AcademicController::class, 'store']);
Route::get('/academic/delete/{id}', [App\Http\Controllers\AcademicController::class, 'destroy']);
Route::post('/academic/update/{id}', [App\Http\Controllers\AcademicController::class, 'update']);

Route::get('/experience/index', [App\Http\Controllers\ExperienceController::class, 'index']);
Route::post('/experience/store', [App\Http\Controllers\ExperienceController::class, 'store']);
Route::get('/experience/delete/{id}', [App\Http\Controllers\ExperienceController::class, 'destroy']);
Route::post('/experience/update/{id}', [App\Http\Controllers\ExperienceController::class, 'update']);

Route::get('/document/index', [App\Http\Controllers\DocumentController::class, 'index']);
Route::post('/document/store', [App\Http\Controllers\DocumentController::class, 'store']);
Route::get('/document/edit/{id}', [App\Http\Controllers\DocumentController::class, 'edit']);
Route::post('/document/update/{id}', [App\Http\Controllers\DocumentController::class, 'update']);

Route::get('/payment/index', [App\Http\Controllers\PaymentController::class, 'index']);
Route::post('/payment/store', [App\Http\Controllers\PaymentController::class, 'store']);
Route::get('/payment/edit/{id}', [App\Http\Controllers\PaymentController::class, 'edit']);
Route::post('/payment/update/{id}', [App\Http\Controllers\PaymentController::class, 'update']);

Route::post('/final/store', [App\Http\Controllers\FinalsubmittedController::class, 'store']);
Route::get('/preview/index', [App\Http\Controllers\PreviewController::class, 'index']);
