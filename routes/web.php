<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\Job;


Route::get('/', function () {
    return view('index', [
        'greeting' => 'Ciao'
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('empolyer')->latest()->simplePaginate(20);
    //dd($jobs[0]);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'created_at',
        Carbon::now(),
        'updated_at',
        Carbon::now(),
        'empolyer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});