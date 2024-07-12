<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Department;
use App\Http\Controllers\QueriesController;

Route::get('/employees', function () {
    return Employee::with('department')->get();
});

Route::get('/departments', function () {
    return Department::with('employees')->get();
});

Route::get('/queries', [QueriesController::class, 'index'])->name('index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', [QueriesController::class, 'showCreateForm'])->name('users.create_form');

Route::post('/users/create', [QueriesController::class, 'createUser'])->name('users.create');
