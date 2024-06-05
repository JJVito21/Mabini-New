<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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


<<<<<<< HEAD
=======
Route::get('/', [MainController::class, 'homepage']);
Route::get('/programs', [MainController::class, 'programs']);

>>>>>>> c4faf6061f51889bb27503294135296c086b656f

// Admin Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// User Routes
Route::get('/', [UserController::class, 'homepage']);
Route::get('memo', [UserController::class, 'memo']);
Route::get('programs', [UserController::class, 'programs']);
Route::get('procurement', [UserController::class, 'procurement']);
Route::get('about', [UserController::class, 'about']);
Route::get('contact', [UserController::class, 'contact']);
require __DIR__.'/auth.php';
