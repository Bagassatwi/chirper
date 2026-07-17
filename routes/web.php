<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\FormController;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', [ChirpController::class, "index"]);
Route::post('/upload-chirp', [FormController::class, "upload"]);
Route::get('/login', fn() => View('login'));
Route::post('/login', [FormController::class, 'login']);
Route::delete('/chirps/{id}', [ChirpController::class, 'destroy']);
