<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


# Avaleht URL
Route::get('/', [TodoController::class, 'index'])->name('welcome');

# Näita ülesannet
Route::get('/tasks/{task}', [TodoController::class, 'show'])->name('show');

