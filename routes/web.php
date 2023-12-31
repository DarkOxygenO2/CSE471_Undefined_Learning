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

Route::get('/resetPassword', [AuthManager::class, 'resetPassword'])->name('resetPassword');
Route::post('/resetPassword', [AuthManager::class, 'resetPasswordPost'])->name('resetPassword.post');


Route::get('/courses', [AuthManager::class, 'courses'])->name('courses');

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/enrolled-courses', [AuthManager::class, 'enrolledCourses'])->name('enrolledCourses');


Route::get('/process-payment', [AuthManager::class, 'processPayment'])->name('processPayment');

Route::get('/video', [AuthManager::class, 'video'])->name('video');




use App\Models\CourseEnrollment;
use Illuminate\Support\Facades\DB;

Route::get('/enroll-user', function () {
    $user_id = 123;
    $course_name = "Sample Course";
    $course_description = "Description of the Sample Course";

    try {
        DB::table('course_enrollment')->insert([
            'user_id' => $user_id,
            'course_name' => $course_name,
            'course_description' => $course_description,
        ]);

        return "User enrolled in the course successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

