<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\Job;
use App\Http\Controllers\JobController;


Route::get('/', function () {
    return view('index', [
        'greeting' => 'Ciao'
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', [JobController::class, 'index']);
//     Route::get('/jobs/create', [JobController::class, 'create']);
//     Route::get('/jobs/{job}', [JobController::class, 'show']);
//     Route::post('/jobs', [JobController::class, 'store']);
//     Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
//     Route::patch('/jobs/{job}', [JobController::class, 'update']);
//     Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// });


