<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReviewController;

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


Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

Route::get('/cars/create', [CarController::class, 'create'])->middleware(['auth', 'verified'])->name('cars.create');

Route::post('/cars', [CarController::class, 'store'])->middleware(['auth', 'verified'])->name('cars.store');

Route::get('/cars/{id}', [CarController::class, 'show'])->middleware(['auth', 'verified'])->name('cars.show');

Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->middleware(['auth', 'verified'])->name('cars.edit');

Route::patch('/cars/{id}', [CarController::class, 'update'])->middleware(['auth', 'verified'])->name('cars.update');

Route::delete('/cars/{id}', [CarController::class, 'destroy'])->middleware(['auth', 'verified'])->name('cars.destroy');



Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/reviews/create', [ReviewController::class, 'create'])->middleware(['auth', 'verified'])->name('reviews.create');

Route::post('/reviews', [ReviewController::class, 'store'])->middleware(['auth', 'verified'])->name('reviews.store');

Route::get('/reviews/{id}', [ReviewController::class, 'show'])->middleware(['auth', 'verified'])
->name('reviews.show');

Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->middleware(['auth', 'verified'])->name('reviews.edit');

Route::patch('/reviews/{id}', [ReviewController::class, 'update'])->middleware(['auth', 'verified'])->name('reviews.update');

Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->middleware(['auth', 'verified'])->name('reviews.destroy');



Route::get('/comments', [CommentController::class, 'index'])->middleware(['auth', 'can:moderator'])->name('comments.index');

Route::get('/comments/create', [CommentController::class, 'create'])->middleware(['auth', 'verified'])->name('comments.create');

Route::post('/comments', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comments.store');

Route::get('/comments/{id}', [CommentController::class, 'show'])->middleware(['auth', 'verified'])->name('comments.show');

Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->middleware(['auth', 'verified'])->name('comments.edit');

Route::patch('/comments/{id}', [CommentController::class, 'update'])->middleware(['auth', 'verified'])->name('comments.update');

Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('comments.destroy');



Route::get('/users', [ProfileController::class, 'index'])->middleware(['auth', 'can:admin'])->name('users.index');

Route::get('/users/create', [ProfileController::class, 'create'])->middleware(['auth', 'verified'])->name('users.create');

Route::post('/users', [ProfileController::class, 'store'])->middleware(['auth', 'verified'])->name('users.store');

Route::get('/users/{id}', [ProfileController::class, 'show'])->middleware(['auth', 'verified'])
->name('users.show');



Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::resource('car',CarController::class)->except(['show','edit','update','delete']);


Route::get('/dashboard', function () {
    return view('userDashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
