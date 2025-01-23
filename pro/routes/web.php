<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Translation\ArrayLoader;
use App\Models\Job;

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;


Route::get('/', function () {

    return view('home');
});


Route::get('/jobs', [JobController::class, 'index']);                         
Route::get('/jobs/create',[JobController::class,'create']);
Route::get('/jobs/{job}', [JobController::class,'show']);
Route::post('/jobs',[JobController::class,'store']);
Route::get('/jobs/{job}/edit',[JobController::class,'edit']);
Route::patch('/jobs/{job}', [JobController::class,'update']);
Route::delete('/jobs/{job}',[JobController::class,'destroy']);


Route::get('/contact', function () {
    return view('contact');
});
