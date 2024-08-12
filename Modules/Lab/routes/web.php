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


// Route::group([], function () {
//     Route::resource('lab', LabController::class)->names('lab');
// });
