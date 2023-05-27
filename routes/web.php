<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordlistController;
use App\Http\Controllers\WordController;

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


Route::get('/',[WordlistController::class, 'index']);
Route::get('/wordlists', [WordlistController::class, 'index']);



// admin 
Route::get('/createwordlist', function () {
    return view('backend/createwordlist');
});
Route::post('/createwordlist', [WordlistController::class, 'createwordlist']);

Route::get('/addword', function () {
    return view('backend/addword');
});
Route::post('/addword', [WordController::class, 'store']);



//user
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [WordlistController::class, 'index'])->name('dashboard');

    //practice
    Route::get('/practice', function () {
        return view('frontend/flashcard');
    });

});