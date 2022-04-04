<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');


Route::get('/login', [AuthController::class, 'loginShow'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::get('/register', [AuthController::class, 'registerShow'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess']);
Route::post('/logout', [AuthController::class, 'logoutProcess'])->name('logout');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/books', [BooksController::class, 'bookIndex'])->name('bookIndex');
    Route::get('/books/{book}', [BooksController::class, 'bookShow'])->name(('bookShow'));
    Route::get('/settings', [UsersController::class, 'index'])->name('userSetting');
    Route::post('/settings', [UsersController::class, 'process']);    
    Route::get('/rent/{book}', [BooksController::class, 'rentBook'])->name('rentBook');
    Route::post('/rent/{book}', [BooksController::class, 'rentBookProcess']);
    Route::get('/back/{book}', [BooksController::class, 'backBook'])->name('backBook');
    Route::post('/back/{book}', [BooksController::class, 'backBookProcess']);
});

Route::group(['middleware'=>'auth', 'prefix'=>'settings'], function(){
    Route::get('/edit/name', [UsersController::class, 'changeName'])->name('changeName');
    Route::get('/edit/password', [UsersController::class, 'changePassword'])->name('changePassword');
    Route::post('/edit/name', [UsersController::class, 'changeNameProcess']);
    Route::post('/edit/password', [UsersController::class, 'changePasswordProcess']);    
    Route::get('/changeToPremium', [UsersController::class, 'changeToPremium'])->name('premium');
    Route::get('/premiumBenefit', [UsersController::class, 'premiumBenefit'])->name('premiumBenefit');
});
