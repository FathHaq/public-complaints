<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ComplaintResponseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints.index');
Route::get('/complaints/create', [ComplaintController::class, 'create'])->name('complaints.create');
Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');

Route::get('/response-complaints', [ComplaintResponseController::class, 'index'])->name('complaints.response.index')->middleware('admin');
Route::get('/response-complaints/create/{id}', [ComplaintResponseController::class, 'create'])->name('complaints.response.create')->middleware('admin');
Route::post('/response-complaints/{id}', [ComplaintResponseController::class, 'store'])->name('complaints.response.store')->middleware('admin');
