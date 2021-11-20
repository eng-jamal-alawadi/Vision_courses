<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PagesController;



Route::prefix('admin')->middleware('auth','check_user')->group(function(){

    Route::get('/',[AdminController::class,'index'])->name('admin.home')->middleware('check_admin');
    Route::resource('categories', CategoryController::class);
    Route::resource('courses', CourseController::class);
    Route::get('/all-registrations',[CourseController::class,'registrations'])->name('registrations');
    Route::delete('/all-registrations/{id}',[CourseController::class,'registrationsDelet'])->name('registrations.destroy');
});



Route::get('/', [PagesController::class,'index'])->name('homepage');
Route::post('/search', [PagesController::class,'search'])->name('search');
Route::get('/course/{slug}', [PagesController::class,'course'])->name('course');
Route::get('/courseRegister/{slug}', [PagesController::class,'courseRegister'])->name('courseRegister');
Route::post('/courseRegister/{slug}', [PagesController::class,'registerSubmit']);
Route::get('/pay/{id}', [PagesController::class,'pay'])->name('pay');
Route::get('/thanks/{id}', [PagesController::class,'thanks'])->name('thanks');
Route::get('/contact', [PagesController::class,'contact'])->name('contact');
Route::post('/contactSubmit', [PagesController::class,'contactSubmit'])->name('contactSubmit');



Auth::routes();
// علشان الغي صفحة التسجيل register
// Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
