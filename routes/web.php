<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'login'])->name('user.login');

Route::post('/login', [UserController::class, 'authenticate'])->name('user.authenticate');

Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/register', [UserController::class, 'register'])->name('user.register');

Route::get('/save', [UserController::class, 'save'])->name('user.save');

Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth.custom');

Route::get('/books', [BookController::class, 'index'])->name('books.index')->middleware('auth.custom');

Route::get('/create', [BookController::class, 'create'])->name('books.create')->middleware('auth.custom');

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show')->middleware('auth.custom');

Route::post('/books/store', [BookController::class, 'store'])->name('books.store')->middleware('auth.custom');

Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('books.edit')->middleware('auth.custom');

Route::put('/books/update/{book}', [BookController::class, 'update'])->name('books.update')->middleware('auth.custom');

Route::delete('/books/destroy/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('auth.custom');

Route::get('/search', [BookController::class, 'search'])->name('books.search')->middleware('auth.custom');