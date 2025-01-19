<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/browse-jobs', function () {
    return view('job-lists');
})->name('job-lists');

Route::get('/job-categories', function () {
    return view('job-categories');
})->name('job-categories');

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


