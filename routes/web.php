<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamMemberController;

Route::get('/', function () {
    return view('frontend.index');
})->name('index');
Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/our-team', [UserController::class, 'team'])->name('team');
Route::get('/book', [UserController::class, 'book'])->name('book');
Route::get('/research', [UserController::class, 'research'])->name('research');
Route::get('/video', [UserController::class, 'video'])->name('video');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'users' => UserController::class,
        'resources' => ResourceController::class,
        'teammembers' => TeamMemberController::class,
    ]);
});
