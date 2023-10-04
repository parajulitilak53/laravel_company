<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\backend\AboutsController;
use App\Http\Controllers\backend\ServicsController;
use App\Http\Controllers\backend\SlidersController;
use App\Http\Controllers\backend\SettingsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::resource('admin', HomeController::class);
// Route::resource('frontend', ServiceController::class);


// front end routes
Route::prefix('/')->group(function () {
Route::get('/', [FrontendController::class, 'index']);
Route::get('service', [FrontendController::class, 'service']);
Route::get('about', [FrontendController::class, 'about']);
Route::get('team', [FrontendController::class, 'teams']);
Route::get('testimonial', [FrontendController::class, 'testimonials']);
Route::get('blog', [FrontendController::class, 'blog']);
Route::get('blog-single', [FrontendController::class, 'blog_single']);
Route::get('pricing', [FrontendController::class,'pricing']);
Route::get('contact', [FrontendController::class, 'contact']);
Route::get('portfolio', [FrontendController::class, 'portfolio']);
Route::get('portfolio-details', [FrontendController::class, 'portfolio_details']);

});


// admin routes
// Route::prefix('admin/')->middleware('auth')->group(function () {
//     Route::resource('/', AdminHomeController::class);
//     Route::resource('sliders', SlidersController::class);
//     Route::resource('abouts', AboutsController::class);
//     Route::resource('services', ServicsController::class);
// });
// Route::prefix('admin')->group(function () {
//     Route::resource('posts', PostController::class);
//     Route::resource('comments', CommentController::class);
// });

Route::prefix('admin/')->group(function () {
    Route::resource('/', AdminHomeController::class);
    Route::resource('sliders', SlidersController::class);
    Route::resource('abouts', AboutsController::class);
    Route::resource('services', ServicsController::class);
    Route::resource('settings', SettingsController::class);
});


// Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.index');
// Route::get('/admin/sliders', [SlidersController::class, 'index'])->name('admin.sliders.index');
// Route::get('/admin/sliders/create', [SlidersController::class, 'create'])->name('admin.sliders.create');
// Route::post('/admin/sliders/store', [SlidersController::class, 'store'])->name('admin.sliders.store');
// Route::get('/admin/sliders/{id}/edit', [SlidersController::class,'edit']);
// Route::put('/admin/sliders/{id}/update', [SlidersController::class,'update']);
// Route::delete('/admin/sliders/{id}/delete', [SlidersController::class,'destroy']);
// Route::get('/admin/sliders/{id}/show', [SlidersController::class,'show']);


// Route::get('/admin/abouts', [AboutsController::class, 'index'])->name('admin.abouts.index');
// Route::get('/admin/abouts/create', [AboutsController::class, 'create'])->name('admin.abouts.create');
// Route::post('/admin/abouts/store', [AboutsController::class, 'store'])->name('admin.abouts.store');
// Route::get('/admin/abouts/{id}/edit', [AboutsController::class,'edit']);
// Route::put('/admin/abouts/{id}/update', [AboutsController::class,'update']);
// Route::delete('/admin/abouts/{id}/delete', [AboutsController::class,'destroy']);
// Route::get('/admin/abouts/{id}/show', [AboutsController::class,'show']);

// Route::get('/admin/services', [ServicsController::class, 'index'])->name('admin.services.index');
// Route::get('/admin/services/create', [ServicsController::class, 'create'])->name('admin.services.create');
// Route::post('/admin/services/store', [ServicsController::class, 'store'])->name('admin.services.store');
// Route::get('/admin/services/{id}/edit', [ServicsController::class,'edit']);
// Route::put('/admin/services/{id}/update', [ServicsController::class,'update']);
// Route::delete('/admin/services/{id}/delete', [ServicsController::class,'destroy']);
// Route::get('/admin/services/{id}/show', [ServicsController::class,'show']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
