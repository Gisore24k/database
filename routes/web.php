<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\Home\AboutController;


Route::get('/', function () {
    return view('frontend.index');
});

//Admin All Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/edit/profile','editProfile')->name('edit.profile');
    Route::post('/store/profile','storeProfile')->name('store.profile');

    Route::get('/change/password','changePassword')->name('change.password');
    Route::post('/update/password','updatePassword')->name('update.password');
});


//HomeSlide All Route
Route::controller(HomeSlideController::class)->group(function(){
    Route::get('/home/slide','homeSlider')->name('home.slide');
    Route::post('/update/slider','updateSlider')->name('update.slider');
});


//About Page All Route
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page','aboutPage')->name('about.page');
    Route::post('/update/about','updateAbout')->name('update.about');
    Route::get('/about','homeAbout')->name('home.about');

    Route::get('/about/multi/image','aboutMultiImage')->name('about.multi.image');
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
