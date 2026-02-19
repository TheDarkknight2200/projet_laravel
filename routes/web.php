<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CoursController;
Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::resource('etudiants', EtudiantController::class);
Route::resource('cours', CoursController::class);
