<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::redirect('/', 'employees', 301);

Route::resource('employees', EmployeeController::class);
