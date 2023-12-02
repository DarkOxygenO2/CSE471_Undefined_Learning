<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) -> name('home')  ;

Route::get('/login', [AuthManager::class, 'login']) -> name('login') ;
Route::post('/login', [AuthManager::class, 'loginPost']) -> name('login.post') ;

Route::get('/registration', [AuthManager::class,'registration']) -> name('registration') ;
Route::post('/registration', [AuthManager::class,'registrationPost']) -> name('registration.post') ;

Route::get('/logout', [AuthManager::class, 'logout']) -> name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/forgotPassword', [AuthManager::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgotPassword', [AuthManager::class, 'forgotPasswordPost'])->name('forgotPassword.post');


Route::get('/courses', [AuthManager::class, 'courses'])->name('courses'); // New route for courses

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/enrolled-courses', [AuthManager::class, 'enrolledCourses'])->name('enrolledCourses');

Route::get('/courses/{courseCode}', [CourseController::class, 'view'])->name('viewCourse');