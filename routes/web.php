<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Department;

Route::get('/employees', function () {
    return Employee::with('department')->get();
});

Route::get('/departments', function () {
    return Department::with('employees')->get();
});

Route::get('/', function () {
    return view('welcome');
});
