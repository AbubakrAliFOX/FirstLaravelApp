<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\Job;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('index', [
        'greeting' => 'Ciao'
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

//This sumes it all up in one line
//Route::resource('jobs', JobController::class);

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', [JobController::class, 'index']);
    Route::get('/jobs/create', [JobController::class, 'create']);
    Route::get('/jobs/{job}', [JobController::class, 'show']);
    Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
        ->middleware('auth')
        ->can('edit-job', 'job');
    Route::patch('/jobs/{job}', [JobController::class, 'update'])
        ->middleware('auth')
        ->can('edit-job', 'job');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
        ->middleware('auth')
        ->can('edit-job', 'job');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);


