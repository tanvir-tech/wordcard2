<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordlistController;

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

Route::get('/', function () {
    return view('frontend/flashcard');
});
Route::get('/wordlists', [WordlistController::class, 'index']);

// admin 
Route::get('/createwordlist', function () {
    return view('backend/createwordlist');
});
Route::post('/createwordlist', [WordlistController::class, 'createwordlist']);

Route::get('/addword', function () {
    return view('backend/addword');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
