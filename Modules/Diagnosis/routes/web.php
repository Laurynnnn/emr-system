<?php

use Illuminate\Support\Facades\Route;
use Modules\Diagnosis\Http\Controllers\DiagnosisController;

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
Route::middleware(['auth'])->group(function () {
    Route::resource('diagnoses', DiagnosisController::class);
    Route::get('/diagnosis/inactive', [DiagnosisController::class, 'inactive'])->name('diagnoses.inactive');
    Route::patch('/diagnosis/reactivate/{id}', [DiagnosisController::class, 'reactivate'])->name('diagnoses.reactivate');
    Route::get('diagnosis/trashed/{id}', [DiagnosisController::class, 'show_inactive'])->name('diagnoses.show_inactive');
});


// Route::group([], function () {
//     Route::resource('diagnosis', DiagnosisController::class)->names('diagnosis');
// });
