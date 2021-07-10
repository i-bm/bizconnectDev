<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Auth::routes(['verify' => true]);



Route::group(['middleware' => ['auth','statusCheck']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('access', [App\Http\Controllers\AccessController::class, 'index'])->name('access.index');
    Route::post('access/addrole', [App\Http\Controllers\AccessController::class, 'addrole'])->name('role.add');
    Route::post('access/addpermission', [App\Http\Controllers\AccessController::class, 'addpermission'])->name('permission.add');
    Route::post('access/rolepermission/{id}', [App\Http\Controllers\AccessController::class, 'rolepermission'])->name('permission.role');

});


Route::get('/auth/login', [App\Http\Controllers\AuthController::class, 'index'])->name('user_login');

Route::get('/auth/register', [App\Http\Controllers\AuthController::class, 'register'])->name('user_register');

Route::post('/authregister/authenticate', [App\Http\Controllers\AuthController::class, 'registeruser'])->name('register_auth');

Route::get('/account/verification/{id}/{hash}', [App\Http\Controllers\AuthController::class, 'verify'])->name('user_verify');

Route::post('/account/verify/{id}', [App\Http\Controllers\AuthController::class, 'verify_now'])->name('verify_now');

Route::post('/authlogin/auth', [App\Http\Controllers\AuthController::class, 'loginuser'])->name('login_auth');

Route::any('/account/verification/resend/{id}', [App\Http\Controllers\AuthController::class, 'resend_verification'])->name('resend_verification');