<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Translation\ArrayLoader;
//use App\Models\Job;

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use Illuminate\Contracts\Session\Session;
use Illuminate\Types\Relations\Role;
use App\Http\Controllers\Auth\LoginController;



Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs',  'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}','show');
//     Route::post('/jobs',  'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}',  'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth');


//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Route::get('/login', [SessionController::class,'create']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class,'store']);

Route::post('/logout', [SessionController::class,'destroy'])->name('logout');
