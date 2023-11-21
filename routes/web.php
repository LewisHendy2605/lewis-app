<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
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

Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

Route::get('/cars/{id}', [CarController::class, 'show'])
->name('cars.show');



Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/reviews/{id}', [ReviewController::class, 'show'])
->name('reviews.show');



Route::get('/users', [ProfileController::class, 'index'])->name('users.index');

Route::get('/users/create', [ProfileController::class, 'create'])->name('users.create');

Route::post('/users', [ProfileController::class, 'store'])->name('users.store');

Route::get('/users/{id}', [ProfileController::class, 'show'])
->name('users.show');



Route::get('/', function () {
    #return view('test', ['name' => 'Brian']);
    return view('welcome');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
