<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuastController;
use App\Http\Controllers\QuestionAnswerController;
use App\Models\QuestionAnswer;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//   
//     return view('welcome');
// })->name('/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('notes-delete/{uuid}', [QuestionAnswerController::class, 'delete'])->name('delete');
    Route::resource('iqa', QuestionAnswerController::class);
    Route::get('notes/{uuid}', [QuestionAnswerController::class, 'note'])->name('notes');
});

// Frontend
Route::get('/', [GuastController::class, 'home'])->name('/');
Route::get('guast-notes/{uuid}', [GuastController::class, 'guastNotes'])->name('guast.notes');
Route::get('guast-course/{uuid}', [GuastController::class, 'guastCourse'])->name('guast.course');
Route::get('like/{uuid}', [GuastController::class, 'like'])->name('like');
Route::get('dislike/{uuid}', [GuastController::class, 'dislike'])->name('dislike');




Route::get('admin-login', function () {
    return view('admin.admin-login');
})->name('admin.login');
Route::get('admin-sign-up', function () {
    return view('admin.admin-sign-up');
})->name('admin.sign-up');
