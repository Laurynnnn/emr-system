<?php

use Illuminate\Support\Facades\Route;
use Modules\MedicalRecord\Http\Controllers\MedicalRecordController;

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

Route::resource('medical_records', MedicalRecordController::class);
Route::resource('patients.medical-records', MedicalRecordController::class);

// Route::group([], function () {
//     Route::resource('medicalrecord', MedicalRecordController::class)->names('medicalrecord');
// });
