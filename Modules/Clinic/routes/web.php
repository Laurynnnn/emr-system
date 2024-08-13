<?php

use Illuminate\Support\Facades\Route;
use Modules\Clinic\Http\Controllers\ClinicController;

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

Route::resource('clinics', ClinicController::class);
Route::get('/clinic/inactive', [ClinicController::class, 'inactive'])->name('clinics.inactive');
Route::patch('/clinic/reactivate/{id}', [ClinicController::class, 'reactivate'])->name('clinics.reactivate');
Route::get('clinic/trashed/{id}', [ClinicController::class, 'show_inactive'])->name('clinics.show_inactive');

// Route::group([], function () {
//     Route::resource('clinic', ClinicController::class)->names('clinic');
// });
