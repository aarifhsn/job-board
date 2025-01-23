<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Job\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Admin\AdminController;

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
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/browse-jobs', [JobController::class, 'viewJobs'])->name('job-lists');

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

Route::get('/job-details/{id}', [JobController::class, 'show'])->name('job-details');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');

Route::get('/tag/{name}', [TagController::class, 'index'])->name('tags.index');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');

Route::get('/category/{name}', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/login/company', [CompanyController::class, 'showLoginForm'])->name('company.login');
Route::post('/login/company', [CompanyController::class, 'login']);

Route::get('/register/company', [CompanyController::class, 'showRegistrationForm'])->name('company.register');
Route::post('/register/company', [CompanyController::class, 'register']);

Route::middleware(['auth', 'company'])->group(function () {
    Route::get('/company/dashboard', function () {
        return view('company.dashboard');
    })->name('company.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/candidates', [AdminController::class, 'candidates'])->name('admin.candidates');
    Route::get('/admin/companies', [AdminController::class, 'companies'])->name('admin.companies');
    Route::post('/admin/companies/{id}/approve', [AdminController::class, 'approveCompany'])->name('admin.companies.approve');
});



