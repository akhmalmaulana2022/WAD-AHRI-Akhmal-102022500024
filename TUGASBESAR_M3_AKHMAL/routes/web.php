<?php

use App\Http\Controllers\AsetController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/aset');

Route::resource('aset', AsetController::class)
    ->only(['index', 'store', 'show', 'destroy']);