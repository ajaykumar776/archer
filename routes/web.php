<?php

use App\Http\Controllers\TimeLogController;
use App\Livewire\EmployeeTimeLogForm;
use App\Livewire\EmployeeTimeLogList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/emplogin/time-log', function () {
        return view('time-log'); // This should render a Blade view that extends 'layouts.app'
    });
});
Route::get('/time-log/create', [TimeLogController::class, 'create'])->name('time-log.create');
Route::get('/time-log/edit/{id}', [TimeLogController::class, 'edit'])->name('time-log.edit');
Route::get('/time-log/list', [TimeLogController::class, 'list'])->name('time-log.list');


