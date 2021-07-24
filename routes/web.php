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
    Route::get('/access', [App\Http\Controllers\AccessController::class, 'index'])->name('access.index');
    Route::post('/access/addrole', [App\Http\Controllers\AccessController::class, 'addrole'])->name('role.add');
    Route::post('/access/addpermission', [App\Http\Controllers\AccessController::class, 'addpermission'])->name('permission.add');
    Route::post('/access/rolepermission/{id}', [App\Http\Controllers\AccessController::class, 'rolepermission'])->name('permission.role');

});

Route::group(['middleware' => ['auth','statusCheck']], function() {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/users/add', [App\Http\Controllers\UserController::class, 'user_create'])->name('user.create');
    Route::any('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'user_update'])->name('user.update');
    Route::delete('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'user_delete'])->name('user.delete');
});


Route::group(['middleware' => ['auth','statusCheck']], function() {
    Route::get('/packages', [App\Http\Controllers\PackageController::class, 'index'])->name('packages.index');
    Route::post('/packages/add', [App\Http\Controllers\PackageController::class, 'package_create'])->name('package.create');
    Route::any('/packages/edit/{id}', [App\Http\Controllers\PackageController::class, 'package_update'])->name('package.update');
    Route::delete('/packages/delete/{id}', [App\Http\Controllers\PackageController::class, 'package_delete'])->name('package.delete');
    
});


Route::group(['middleware' => ['auth','statusCheck']], function() {
    Route::get('/themes', [App\Http\Controllers\ThemeController::class, 'index'])->name('themes.index');
    Route::post('/themes/add', [App\Http\Controllers\ThemeController::class, 'theme_create'])->name('theme.create');
    Route::any('/themes/edit/{id}', [App\Http\Controllers\ThemeController::class, 'theme_update'])->name('theme.update');
    Route::delete('/themes/delete/{id}', [App\Http\Controllers\ThemeController::class, 'theme_delete'])->name('theme.delete');

    
    
});

Route::group(['middleware' => ['auth','statusCheck']], function() {
    Route::get('/setup/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::post('/setup/categories/add', [App\Http\Controllers\CategoryController::class, 'category_create'])->name('category.create');
    Route::any('/setup/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'category_update'])->name('category.update');
    Route::delete('/setup/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'category_delete'])->name('category.delete');
});

Route::group(['middleware' => ['auth','statusCheck']], function() {
    Route::get('/setup/checklist', [App\Http\Controllers\ChecklistController::class, 'index'])->name('checklist.index');
    Route::post('/setup/checklist/add', [App\Http\Controllers\ChecklistController::class, 'checklist_create'])->name('checklist.create');
    Route::any('/setup/checklist/edit/{id}', [App\Http\Controllers\ChecklistController::class, 'checklist_update'])->name('checklist.update');
    Route::delete('/setup/checklist/delete/{id}', [App\Http\Controllers\ChecklistController::class, 'checklist_delete'])->name('checklist.delete');
});

Route::get('/auth/login', [App\Http\Controllers\AuthController::class, 'index'])->name('user_login');

Route::get('/auth/register', [App\Http\Controllers\AuthController::class, 'register'])->name('user_register');

Route::post('/authregister/authenticate', [App\Http\Controllers\AuthController::class, 'registeruser'])->name('register_auth');

Route::get('/account/verification/{id}/{hash}', [App\Http\Controllers\AuthController::class, 'verify'])->name('user_verify');

Route::post('/account/verify/{id}', [App\Http\Controllers\AuthController::class, 'verify_now'])->name('verify_now');

Route::post('/authlogin/auth', [App\Http\Controllers\AuthController::class, 'loginuser'])->name('login_auth');

Route::any('/account/verification/resend/{id}', [App\Http\Controllers\AuthController::class, 'resend_verification'])->name('resend_verification');