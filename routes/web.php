<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/posts", PostController::class);
Route::resource("/students", StudentsController::class);
Route::resource("/school", SchoolController::class);

