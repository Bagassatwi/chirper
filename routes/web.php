<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', [ChirpController::class, "index"]);
Route::post('/upload-chirp', [FormController::class, "upload"]);
