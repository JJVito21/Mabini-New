<?php

use App\Http\Controllers\MainController;
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



// Admin Routes
Route::get('/homepage', function () {
    return view('adminPages.homepage');
})->middleware(['auth', 'verified'])->name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('memo_management', [MainController::class, 'memo_management'])->name('memo_management');
    Route::get('programs_management', [MainController::class, 'programs_management'])->name('programs_management');
});
// User Routes
Route::get('/', [UserController::class, 'homepage']);
Route::get('memo', [UserController::class, 'memo']);
Route::get('programs', [UserController::class, 'programs']);
Route::get('procurement', [UserController::class, 'procurement']);
Route::get('about', [UserController::class, 'about']);
Route::get('contact', [UserController::class, 'contact']);
require __DIR__.'/auth.php';
