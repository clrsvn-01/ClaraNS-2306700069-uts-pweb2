<?php

use App\Http\Controllers\EmployeeController;

// Halaman utama (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// Halaman data karyawan
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/user/{id}', [EmployeeController::class, 'show']);