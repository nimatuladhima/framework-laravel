<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
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

Route::get('/', [bookController::class, 'index'])->name('index');

Route::resource('buku', 'App\Http\Controllers\bookController');
Route::get('/delete/{id}', [bookController::class, 'delete'])->name('delete');