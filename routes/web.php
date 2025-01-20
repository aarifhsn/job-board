<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\HomeController;
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

// registration and login route 
Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/browse-jobs', function () {
    return view('job-lists');
})->name('job-lists');

Route::get('/job-categories', [HomeController::class, 'jobCategories'])->name('job-categories');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/manage-jobs', function () {
    return view('manage-jobs');
})->name('manage-jobs');

Route::get('/manage-jobs-post', function () {
    return view('manage-jobs-post');
})->name('manage-jobs-post');

Route::get('/job-details', function () {
    return view('job-details');
})->name('job-details');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/logout', function () {
    return view('logout');
})->name('logout');


