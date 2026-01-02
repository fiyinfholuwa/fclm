<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/programmes', 'programmes')->name('programmes');
    Route::get('/publications', 'publications')->name('publications');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'submitContact');
    Route::get('/our/gallery', 'gallery')->name('gallery');
    Route::get('/donation', 'donation')->name('donation');
    Route::get('/blog/{slug}', 'blogDetails');

});
require __DIR__.'/auth.php';
