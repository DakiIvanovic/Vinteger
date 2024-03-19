<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/logged_in', [UserController::class, 'userLogged'])->name('logged_in');
Route::post('/logged_in', [UserController::class, 'userNameShow'])->name('userNameShow');
Route::post('/user_name', [UserController::class, 'userNameShow'])->name('userNameShow');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/logout', [LogoutController::class, 'logout']);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/settings', [SettingsController::class, 'show'])->name('profile.show');
Route::post('/settings/update', [SettingsController::class, 'update'])->name('profile.update');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('/upload/image', [ImageController::class, 'upload'])->name('upload.image');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/add_post', [PostController::class, 'create'])->name('add_post_form');
Route::post('/store_post', [PostController::class, 'store'])->name('store_post');
Route::post('/add_post', [PostController::class, 'store'])->name('add_post');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('delete_post');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.review');
