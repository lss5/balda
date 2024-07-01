<?php

use App\Http\Controllers\BaldaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BaldaController::class, 'index']);
