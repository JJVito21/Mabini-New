<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramsController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('homepage_management', [CarouselController::class, 'homepage_management'])->name('homepage_management');
    Route::post('/uploadImage', [CarouselController::class, 'uploadImage'])->name('uploadImage');
    Route::get('/delete_image{id}', [CarouselController::class, 'delete'])->name('delete_image');
    // Route::put('/update_image/{id}', [CarouselController::class, 'updateImage'])->name('update_image');
});



Route::middleware('auth')->group(function () {
    Route::get('faculty_management', [FacultyController::class, 'faculty_management'])->name('faculty_management');
    Route::post('/addStaff', [FacultyController::class, 'addStaff'])->name('addStaff');
    Route::get('/editStaff{facultyData}', [FacultyController::class, 'editStaff'])->name('editStaff');
    Route::put('/update_Staff{id}', [FacultyController::class, 'update'])->name('update_Staff');
    Route::get('/delete_Staff{facultyData}', [FacultyController::class, 'delete'])->name('delete_Staff');

});


Route::middleware('auth')->group(function () {
    Route::get('programs_management', [ProgramsController::class, 'programs_management'])->name('programs_management');
});

Route::middleware('auth')->group(function () {
    Route::get('procurement_management', [ProcurementController::class, 'procurement_management'])->name('procurement_management');
    Route::post('/uploadItem', [ProcurementController::class, 'uploadProcuredItem'])->name('uploadItem');
    Route::get('/updateItem{procurementItem}/', [ProcurementController::class, 'updateProcuredItem'])->name('updateItem');
    Route::get('/delete_procurement{procurementItem}', [ProcurementController::class, 'delete'])->name('delete_procurement');
});

Route::middleware('auth')->group(function () {
    Route::get('message_management', [MessageController::class, 'message_management'])->name('message_management');
    Route::get('/delete_message/{messageItem}', [MessageController::class, 'delete'])->name('delete_message');
    Route::get('/view_message/{messageItem}', [MessageController::class, 'view'])->name('view_message');
    
});
Route::middleware('auth')->group(function () {
    Route::get('memo_management', [MemoController::class, 'memo'])->name('memo_management');
    Route::post('/upload', [MemoController::class, 'uploadFile'])->name('upload');
    Route::get('/download/{file}', [MemoController::class, 'download']);
    Route::get('/delete_memo{id}', [MemoController::class, 'delete'])->name('delete_memo');
});

// User Routes
Route::get('/', [UserController::class, 'homepage']) ;
Route::get('memo', [UserController::class, 'memo']);
Route::get('programs', [UserController::class, 'programs']);
Route::get('procurement', [UserController::class, 'procurement']);
Route::get('about', [UserController::class, 'about']);
Route::get('faculty', [UserController::class, 'faculty']);
Route::get('contact', [UserController::class, 'contact']) ->name ('contact');
Route::post('send', [UserController::class, 'send']) ->name ('send');

//fallback route
Route::fallback(FallbackController::class);
require __DIR__.'/auth.php';
