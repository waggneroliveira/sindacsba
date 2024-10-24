<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/dashboard.php';

Route::get('/', function () {
    return view('welcome');
});

