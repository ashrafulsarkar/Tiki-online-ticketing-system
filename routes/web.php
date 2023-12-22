<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', []);
Route::post('/', []);

Route::get('/dashboard', []);

Route::get('/location', []);
Route::post('/location', []);
Route::delete('/location', []);

Route::get('/seat-quality', []);
Route::post('/seat-quality', []);
Route::delete('/seat-quality', []);

Route::get('/bus', []);
Route::post('/bus', []);
Route::put('/bus', []);
Route::delete('/bus', []);

Route::get('/trip', []);
Route::post('/trip', []);
Route::put('/trip', []);
Route::delete('/trip', []);