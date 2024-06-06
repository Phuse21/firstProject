<?php

use App\Http\Controllers\jobController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;



//home
Route::view('/', 'home');

//contact
Route::view('/contact', 'contact');

// Route::get('/contact', function () {
//     return view(
//         'contact'
//     );
// });

Route::get('/test', function () {
    $job = job::first();
    TranslateJob::dispatch($job);

    return 'Done';
});

//job routes
Route::controller(jobController::class)->group(function () {

    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create')->middleware('auth');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store')->middleware('auth');

    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'job');

    Route::patch('/jobs/{job}', 'update')->middleware('auth');
    Route::delete('/jobs/{job}', 'destroy')->middleware('auth')->can('destroy', 'job');
});

// Route::resource('jobs', jobController::class);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);