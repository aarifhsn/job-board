<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Job\JobController;
use App\Http\Controllers\Rss\JobFeedController;
use App\Http\Controllers\Rss\NewsController;
use App\Http\Controllers\TagController;
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

// Home and General Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/browse-jobs', [JobController::class, 'viewJobs'])->name('job-lists');
Route::get('/job-categories', [HomeController::class, 'jobCategories'])->name('job-categories');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/jobs/rss', [JobFeedController::class, 'index'])->name('jobs.rss');
Route::get('/jobs/rss-blog', [JobFeedController::class, 'blogInfo'])->name('jobs.rss-blog');

// Authentication Routes
Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Job Routes
Route::get('/job-details/{id}', [JobController::class, 'show'])->name('job-details');
Route::get('/jobs', [JobController::class, 'search'])->name('jobs.search');
Route::get('/jobs/filter', [JobController::class, 'filter'])->name('jobs.filter');

// Tag Routes
Route::get('/tag/{name}', [TagController::class, 'index'])->name('tags.index');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');

// Category Routes
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Profile Route
Route::get('/profile', fn () => view('profile'))->name('profile');

// Company Routes
// Route::get('/company/login', [CompanyController::class, 'showLoginForm'])->name('company.login');
// Route::post('/company/login', [CompanyController::class, 'login']);
Route::get('/company/register', [CompanyController::class, 'showRegistrationForm'])->name('company.register');
Route::post('/company/register', [CompanyController::class, 'register']);

// Routes for Authenticated Companies
Route::middleware(['auth', 'company'])->group(function () {
    Route::get('/company/dashboard', fn () => view('company.dashboard'))->name('company.dashboard');
    Route::get('/company/{slug}', [CompanyController::class, 'profile'])->name('company.profile');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/candidates', [AdminController::class, 'candidates'])->name('admin.candidates');
    Route::get('/admin/companies', [AdminController::class, 'companies'])->name('admin.companies');
    Route::post('/admin/companies/{id}/approve', [AdminController::class, 'approveCompany'])->name('admin.companies.approve');
});

// Placeholder Routes
Route::get('/manage-jobs', fn () => view('manage-jobs'))->name('manage-jobs');
Route::get('/manage-jobs-post', fn () => view('manage-jobs-post'))->name('manage-jobs-post');
