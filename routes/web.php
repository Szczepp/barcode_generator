<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', [FormController::class, 'displayForm']);
Route::post('/handleForm', [FormController::class, 'handleForm']);
Route::get('/barcode/{id}', [FormController::class, 'showCreated'])->name('barcode');
