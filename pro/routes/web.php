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

//index

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->cursorPaginate(3);
    
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});


//create

Route::get('/jobs/create',function(){
    return view('jobs.create');
});


//show

Route::get('/jobs/{id}', function ($id) {
        
    $job=Job::find($id);
        
        return view('jobs.show' ,['job' => $job]);
});


//store 

Route::post('/jobs',function(){
   //dd(request('title'));

   //validation...


   request()->validate([
    'title'=>['required','min:3'],
    'salary'=>['required']

   ]);

   Job::create([
    'title' => request('title'),
    'salary' => request('salary'),
    'employer_id' => 1
   ]);

   return redirect('/jobs');
});


Route::get('/jobs/{id}/edit', function ($id) {
        
    $job=Job::find($id);
        
        return view('jobs.edit' ,['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});