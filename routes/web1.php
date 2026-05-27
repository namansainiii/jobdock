<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\GeocodeController;
use App\Http\Middleware\LogRequest;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class , 'index'])->name('home');

// Route::get('/jobs', [JobController::class , 'index']);

// Route::get('/jobs/create', [JobController::class , 'create']);

// Route::get('/jobs/{id}', [JobController::class, 'show']);

// Route::post('/jobs', [JobController::class , 'store']);

Route::get('/jobs/search', [JobController::class , 'search'])->name('jobs.search');

// Route::resource('jobs', JobController::class);
Route::resource('jobs', JobController::class)->middleware('auth')->only(['create' , 'edit' , 'update' , 'destroy']);
Route::resource('jobs', JobController::class)->except(['create' , 'edit' , 'update' , 'destroy']);


// Route::resource('login', LoginController::class);

//global middleware
// Route::get('/login', [LoginController::class , 'login'])->name('login')->middleware(LogRequest::class);

//middleware in which only guest can acces login and register 
Route::get('/login', [LoginController::class , 'login'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class , 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class , 'logout'])->name('logout');

// Route::resource('register', RegisterController::class);
// Route::get('/register', [RegisterController::class , 'register'])->name('register')->middleware(LogRequest::class);
Route::get('/register', [RegisterController::class , 'register'])->name('register');

Route::post('/register', [RegisterController::class , 'store'])->name('register.store');

//in bulk for guest access

Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class , 'login'])->name('login');
    Route::post('/login', [LoginController::class , 'authenticate'])->name('login.authenticate');
    
    Route::get('/register', [RegisterController::class , 'register'])->name('register');
    Route::post('/register', [RegisterController::class , 'store'])->name('register.store');

});

Route::resource('dashboard', DashboardController::class)->middleware('auth');
// Route::post('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

Route::put('/profile', [ProfileController::class , 'update'])->name('profile.update')->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/bookmarks', [BookmarkController::class , 'index'])->name('bookmarks.index');
    Route::post('/bookmarks/{job}', [BookmarkController::class , 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{job}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::post('jobs/{job}/apply', [ApplicantController::class, 'store'])->name('applicants.store');
    Route::delete('applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy');


});


Route::get('/geocode', [GeocodeController::class , 'geocode']);

?>