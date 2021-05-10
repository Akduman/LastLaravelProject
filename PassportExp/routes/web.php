<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\backend\ExamController;
use App\Http\Controllers\backend\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('template', function () {
    return view('backend.dashboard');
});


Route::post('/Login', [AuthController::class,'Login'])->name('Auth.Login');
Route::get('/Login', [AuthController::class,'LoginPage'])->name('Auth.LoginPage');
Route::get('/Logout', [AuthController::class,'Logout'])->name('Auth.Logout');

Route::resource('exams', ExamController::class);
Route::resource('users', UserController::class);



//rol ekle
Route::get('/test1', function () {
    $user=User::find(1);
    $user->syncRoles('Admin');
});

Route::get('/role', function () {
    return User::find(1)->roles;
 
});

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/test2', function () {
        return "okqwewqe";
    });
});

Route::get('/', function () {
    return view('welcome');
});
