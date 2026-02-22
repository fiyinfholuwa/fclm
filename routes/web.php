<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    $sliders = 10;
    $publication = 20;
    $messages = 40;
    return view('admin.dashboard', compact('sliders', 'publication', 'messages'));
})->middleware(['auth'])->name('dashboard');


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::delete('/messages/{id}', [ContactController::class, 'destroy'])->name('messages.destroy');
    Route::get('/messages/{id}', [ContactController::class, 'show'])->name('messages.show');
});

Route::post('/save/contact', [ContactController::class, 'submitContact']);

Route::middleware('auth')->group(function () {

    Route::get('/slider', [AdminController::class, 'view_slider'])->name('slider.view');
    Route::get('/admin/sliders', [AdminController::class, 'getSliders'])->name('admin.sliders.get');
    Route::post('/admin/sliders', [AdminController::class, 'storeSlider'])->name('admin.sliders.store');
    Route::get('/admin/sliders/{id}', [AdminController::class, 'getSingleSlider'])->name('admin.sliders.single');
    Route::put('/admin/sliders/update/{id}', [AdminController::class, 'updateSlider'])->name('admin.sliders.update');
    Route::delete('/admin/sliders/{id}', [AdminController::class, 'deleteSlider'])->name('admin.sliders.delete');
    
    Route::get('/publication', [AdminController::class, 'view_publication'])->name('publication.view');
    Route::get('/admin/publications/data', [AdminController::class, 'getPublications'])->name('admin.publications.data');
    Route::get('/admin/publications/detail/{id}', [AdminController::class, 'getPublicationDetail'])->name('admin.publications.detail');
    Route::post('/admin/publications', [AdminController::class, 'storePublication'])->name('admin.publications.store');
    Route::put('/admin/publications/{id}', [AdminController::class, 'updatePublication'])->name('admin.publications.update');
    Route::delete('/admin/publications/{id}', [AdminController::class, 'deletePublication'])->name('admin.publications.delete');
    Route::post('/admin/publications/{id}/toggle-status', [AdminController::class, 'togglePublicationStatus'])->name('admin.publications.toggle-status');
    Route::post('/admin/publications/{id}/toggle-featured', [AdminController::class, 'toggleFeatured'])->name('admin.publications.toggle-featured');
    
    Route::get('/messages', [AdminController::class, 'view_messages'])->name('messages.view');


    
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
