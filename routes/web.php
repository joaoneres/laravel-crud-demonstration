<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('customers')->group(function () {
    Route::get('/', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}/show', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
    Route::get('/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/{id}/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/{id}/delete', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customers.delete');
});
