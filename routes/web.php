<?php

use Illuminate\Support\Facades\Route;

use App\Models\Job;


Route::get('/', function () {
    return view('index', [
        'greeting' => 'Ciao'
    ]);
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobDetails', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});