<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Carbon\Carbon;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('empolyer')->latest()->simplePaginate(20);
        //dd($jobs[0]);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
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
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
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
    }
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
