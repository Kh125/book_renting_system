<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookUploadController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsersController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
})->middleware('guest')->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');


Route::get('/login', [AuthController::class, 'loginShow'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::get('/register', [AuthController::class, 'registerShow'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess']);
Route::post('/logout', [AuthController::class, 'logoutProcess'])->name('logout');
Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget-password');
Route::post('/forget-password', [AuthController::class, 'forgetPasswordProcess']);

Route::group(['middleware'=>'guest'], function(){
    Route::get('/reset-password/{token}', [AuthController::class, 'passwordReset'])->middleware('guest')->name('password.reset');
    Route::post('/reset-password/{token}', [AuthController::class, 'passwordResetProcess'])->middleware('guest')->name('password.update');
});
Route::group(['middleware'=>'auth'], function(){
    Route::get('/books', [BooksController::class, 'bookIndex'])->name('bookIndex');
    Route::get('/books/{book}', [BooksController::class, 'bookShow'])->name(('bookShow'));
    Route::get('/settings', [UsersController::class, 'index'])->name('userSetting');
    Route::post('/settings', [UsersController::class, 'process']);    
    Route::get('/rent/{book}', [BooksController::class, 'rentBook'])->name('rentBook');
    Route::post('/rent/{book}', [BooksController::class, 'rentBookProcess']);
    Route::get('/back/{book}', [BooksController::class, 'backBook'])->name('backBook');
    Route::post('/back/{book}', [BooksController::class, 'backBookProcess']);    
    Route::get('/upload', [BookUploadController::class, 'index'])->name('upload');
    Route::post('/upload', [BookUploadController::class, 'process']);
});

Route::group(['middleware'=>'auth', 'prefix'=>'settings'], function(){
    Route::get('/edit/name', [UsersController::class, 'changeName'])->name('changeName');
    Route::get('/edit/password', [UsersController::class, 'changePassword'])->name('changePassword');
    Route::post('/edit/name', [UsersController::class, 'changeNameProcess']);
    Route::post('/edit/password', [UsersController::class, 'changePasswordProcess']);    
    Route::get('/upgradeToPremium', [UsersController::class, 'changeToPremium'])->name('premium');
    Route::post('/upgradeToPremium', [UsersController::class, 'changeToPremiumProcess']);
    Route::get('/premiumBenefit', [UsersController::class, 'premiumBenefit'])->name('premiumBenefit');
    Route::get('/history', [UsersController::class, 'history'])->name('history');
});
