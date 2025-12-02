<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Student Routes
Route::get('/student', [StudentController::class, 'index'])->name('students.index');
Route::get('/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/store', [StudentController::class, 'store'])->name('students.store');

// এই line টি fix করুন: PostController → StudentController
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('students.update');