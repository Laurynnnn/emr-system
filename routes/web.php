<?php

use Illuminate\Support\Facades\Route;

// Redirect root route to the register page
Route::get('/', function () {
    return redirect()->route('login');
});

