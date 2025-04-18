<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// Halaman utama to-do
Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');

// Simpan task baru
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');

// (Opsional) Hapus task
Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');

// (Opsional) Edit task - fitur tambahan
Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
