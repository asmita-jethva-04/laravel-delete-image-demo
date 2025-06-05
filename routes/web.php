<?php

use App\Http\Controllers\PostListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students', [PostListController::class, 'index'])->name('students.index');
Route::post('/students', [PostListController::class, 'store'])->name('students.store');
Route::get('/students/delete/{id}', [PostListController::class, 'destroy'])->name('students.destroy');
Route::post('/students/delete-multiple', [PostListController::class, 'destroyMultiple'])->name('students.destroyMultiple');