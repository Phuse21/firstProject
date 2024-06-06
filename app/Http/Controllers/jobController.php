<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\job;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class jobController extends Controller
{
    public function index()
    {
        $job = job::with('employer')->cursorPaginate(3);
        return view(
            'jobs.index',
            [
                'jobs' => $job
            ]
        );
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);


        $job = job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)
            ->queue(new JobPosted($job));

        return redirect('/jobs');
    }

    public function edit(job $job)
    {
        //authorize
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        // if ($job->employer->User->isNot(Auth::user())) {
        //     abort(401);
        // }

        // //Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(job $job)
    {
        //authorize 
        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        //update

        // $job = job::findOrFail($id);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);


        //redirect

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(job $job)
    {

        // $job = job::findOrFail($id);
        $job->delete();

        // job::findOrFail($id)->delete();

        return redirect('/jobs');
    }
}