<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherMessageController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => 'auth',
], function() {

    Route::get('home', function () { return view('check'); });


    Route::get('/student/index', function () { return view('student/index'); })->name('student.index');
    Route::get('/student/assignment/{kind}/{max}', [AssignmentController::class, 'index'])->name('student.assignment.index');











    Route::get('/teacher/index', function () { return view('teacher/index'); })->name('teacher.index');
    Route::post('/newmessage', [TeacherMessageController::class, 'store'])->name('teacher.message.create');

    Route::get('/teacher/user/create', [UserController::class, 'create'])->name('teacher.user.create');
    Route::post('/teacher/user/create', [UserController::class, 'store'])->name('teacher.user.store');
    Route::get('/teacher/user/edit/{id}', [UserController::class, 'edit'])->name('teacher.user.edit');
    Route::post('/teacher/user/edit/{id}', [UserController::class, 'update'])->name('teacher.user.update');

});