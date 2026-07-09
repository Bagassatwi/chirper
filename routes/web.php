<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', [ChirpController::class, "index"]);
