<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


# Avaleht URL
Route::get('/', [TodoController::class, 'index'])->name('welcome');



# Lisa uus ülesanne (vorm)
Route::get('/tasks/create', [TodoController::class, 'create'])->name('create');

# Salvesta uus ülesanne
Route::post('/tasks', [TodoController::class, 'store'])->name('store');

#Tehtud versus tegemata
Route::patch('/tasks/{task}/toggle', [TodoController::class, 'toggle'])->name('toggle');

# Näita ülesannet
Route::get('/tasks/{task}', [TodoController::class, 'show'])->name('show');

# Ülesande muutmine-1.vorm
Route::get('/tasks/{task}/edit', [TodoController::class, 'edit'])->name('edit');

#Ülesande muutmine - 2.uuenda
Route::put('tasks/{task}', [TodoController::class, 'update'])->name('update');

#Ülesande kustutamine
Route::delete('task/{task}', [TodoController::class, 'destroy'])->name('destroy');
