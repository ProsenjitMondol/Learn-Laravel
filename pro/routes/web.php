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


// Edit

Route::get('/jobs/{id}/edit', function ($id) {
        
    $job=Job::find($id);                
        
        return view('jobs.edit' ,['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
        // validate
        request()->validate([
            'title'=>['required','min:3'],
            'salary'=>['required']
        
           ]);

        // authorite (On hold...)

        // update the job

        $job=Job::findOrFail($id);
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();


        $job->update([
            'title'=>request('title'),
            'salary'=>request('salary')
        ]);

        //and persist


        // redrict to the job page
        return redirect('/jobs/' . $job->id);

});

// Destroy
Route::delete('/jobs/{id}', function ($id) {

    // authorite (On hold...)

    // delete the job
    Job::findOrFail($id) -> delete(); //$job -> delete(); 
    

    // redrict 
    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});