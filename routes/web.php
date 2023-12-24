<?php

use App\Http\Controllers\busController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\seatQualityController;
use App\Http\Controllers\tripController;
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

Route::get( '/', [] );
Route::post( '/', [] );

Route::get( '/dashboard', [ dashboardController::class, 'view' ] );

Route::get( '/location', [ locationController::class, 'view' ] )->name( 'location' );
Route::get( '/location/add', [ locationController::class, 'addview' ] );
Route::post( '/location/add', [ locationController::class, 'addlocation' ] );
Route::delete( '/location', [ locationController::class, 'delete' ] );

Route::get( '/quality', [ seatQualityController::class, 'view' ] )->name( 'quality' );
Route::get( '/quality/add', [ seatQualityController::class, 'addview' ] );
Route::post( '/quality/add', [ seatQualityController::class, 'addquality' ] );
Route::delete( '/quality', [ seatQualityController::class, 'delete' ] );

Route::get( '/bus', [ busController::class, 'view' ] )->name( 'bus' );
Route::get( '/bus/add', [ busController::class, 'addview' ] );
Route::post( '/bus/add', [ busController::class, 'addbus' ] );
Route::get( '/bus/{id}', [ busController::class, 'idview' ] );
Route::post( '/bus/{id}', [ busController::class, 'addbusdetails' ] )->name('bus.details');
Route::delete( '/bus/{id}', [ busController::class, 'detailsDelete' ] );
Route::get( '/bus/{id}/edit', [ busController::class, 'edit' ] );
Route::put( '/bus/{id}/edit', [ busController::class, 'editdb' ] );


Route::get( '/trip', [tripController::class, 'view'] )->name('trip');
Route::get( '/trip/add', [tripController::class, 'addview'] );
Route::post( '/trip/add', [tripController::class, 'addtrip'] );
Route::delete( '/trip', [tripController::class, 'delete'] );