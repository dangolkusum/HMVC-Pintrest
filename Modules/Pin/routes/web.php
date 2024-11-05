<?php

use Illuminate\Support\Facades\Route;
use Modules\Pin\app\Http\Controllers\PinController;

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

Route::group(['prefix' => 'pins', 'middleware' => 'web'], function () {
    Route::get('/', [PinController::class, 'index'])->name('pins.index');
    Route::post('/delete/{id}', [PinController::class, 'destroy']);
    Route::get('/create', [PinController::class, 'create'])->name('pins.create');
    Route::post('/', [PinController::class, 'store'])->name('pins.store');
    Route::get('/{id}/show', [PinController::class, 'show'])->name('');
    Route::get('/{id}/edit', [PinController::class, 'create'])->name('');
    Route::put('/{id}', [PinController::class, 'update'])->name('');
});
