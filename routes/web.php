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

Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],

    ]);

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

Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],

    ]);
    // auth ... soon
    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

Route::delete('/jobs/{job}', function (Job $job) {
    // auth ... soon
    $job->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});