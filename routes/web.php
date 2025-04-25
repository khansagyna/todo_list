<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;

// Halaman awal redirect ke dashboard jika sudah login
Route::get('/', function () {
    return redirect('/dashboard');
});

// Autentikasi Laravel (jika pakai Breeze atau Laravel UI)
Auth::routes();

// Dashboard user setelah login
Route::get('/dashboard', [TodoController::class, 'index'])->middleware('auth')->name('dashboard');

// Group route dengan middleware 'auth' agar hanya user login yang bisa akses
Route::middleware('auth')->group(function () {
    // Tampilkan semua to-do milik user
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');

    // Simpan to-do baru
    Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');

    // Hapus to-do
    Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');

    // Tandai selesai (opsional)
    Route::put('/todo/{id}/done', [TodoController::class, 'markDone'])->name('todo.done');

    // Edit & update (opsional)
    Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
