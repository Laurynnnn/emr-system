<?php

use Illuminate\Support\Facades\Route;
use Modules\Lab\Http\Controllers\LabTestController;

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
Route::resource('lab_tests', LabTestController::class);
Route::get('/lab_test/inactive', [LabTestController::class, 'inactive'])->name('lab_tests.inactive');
Route::patch('/lab_test/reactivate/{id}', [LabTestController::class, 'reactivate'])->name('lab_tests.reactivate');
Route::get('lab_test/trashed/{id}', [LabTestController::class, 'show_inactive'])->name('lab_tests.show_inactive');



// Route::group([], function () {
//     Route::resource('lab', LabController::class)->names('lab');
// });
