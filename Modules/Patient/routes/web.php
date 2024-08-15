<?php

use Illuminate\Support\Facades\Route;
use Modules\Patient\Http\Controllers\PatientController;

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

// Route::group([], function () {
//     Route::resource('patient', PatientController::class)->names('patient');
// });
Route::middleware(['auth'])->group(function () {
    Route::resource('patients', PatientController::class);
    Route::get('/patient/inactive', [PatientController::class, 'inactive'])->name('patients.inactive');
    Route::patch('/patient/reactivate/{id}', [PatientController::class, 'reactivate'])->name('patients.reactivate');
    Route::get('patient/trashed/{id}', [PatientController::class, 'show_inactive'])->name('patients.show_inactive');
});





