<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', [FormController::class, 'displayForm']);
Route::post('/barcode', [FormController::class, 'handleForm']);
