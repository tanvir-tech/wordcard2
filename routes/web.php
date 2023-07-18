<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordlistController;
use App\Http\Controllers\WordController;
use App\Models\Wordlist;
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
    $wordlists = Wordlist::all();
    return view('backend/createwordlist', compact('wordlists'));
});
Route::post('/createwordlist', [WordlistController::class, 'createwordlist_fromexcel'])->name('file.import');

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
    Route::get('/practice/{id}', [WordlistController::class, 'startwordlist']);
    Route::get('/nextword', [WordlistController::class, 'nextword']);

});


