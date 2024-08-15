<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacy\Http\Controllers\DrugController;

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
    Route::resource('drugs', DrugController::class);
    Route::get('/drug/inactive', [DrugController::class, 'inactive'])->name('drugs.inactive');
    Route::patch('/drug/reactivate/{id}', [DrugController::class, 'reactivate'])->name('drugs.reactivate');
    Route::get('drug/trashed/{id}', [DrugController::class, 'show_inactive'])->name('drugs.show_inactive');
});

