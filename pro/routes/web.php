<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Translation\ArrayLoader;
//use App\Models\Job;

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use Illuminate\Types\Relations\Role;


Route::view('/', 'home');
Route::view('/contact', 'contact');

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs',  'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}','show');
//     Route::post('/jobs',  'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}',  'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

Route::resource('jobs',JobController::class);

