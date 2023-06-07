<?php

use App\Http\Controllers\UklController;
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

Route::get('/ujians', function () {
    return view('ujians');
});

Route::get('/ujians', [UklController::class, 'index'])->name('ujians.index');
Route::get('/ujians/create', [UklController::class, 'create'])->name('ujians.create');
Route::post('/ujians', [UklController::class, 'store'])->name('ujians.store');
Route::get('/ujians/{id}/edit', [UklController::class, 'edit'])->name('ujians.edit');
Route::put('/ujians/{id}', [UklController::class, 'update'])->name('ujians.update');
Route::delete('/ujians/{id}', [UklController::class, 'destroy'])->name('ujians.destroy');