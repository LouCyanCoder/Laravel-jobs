<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

// show all listings
Route::get('/', [ListingController::class, 'index']);

// create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// show edit form
Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// store update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// delete a listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// manage users listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('users', [UserController::class, 'store'])->middleware('guest');

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
