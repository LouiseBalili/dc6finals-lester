<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PluginController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DateController;



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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/plugins', [PluginController::class, 'index'])->name('index');
Route::post('/plugins', [PluginController::class, 'store']);
Route::put('/plugins/{id}', [PluginController::class, 'edit']);
Route::delete('/plugins/{id}', [PluginController::class, 'destroy']);

Route::get('/discount', [DiscountController::class, 'indexDiscount'])->name('indexDiscount');
Route::post('/discount', [DiscountController::class, 'storeDiscount']);



Route::middleware('can:manage-admins')->group(function(){

    Route::post('/plugins', [PluginController::class, 'store']);
    Route::put('/plugins/{id}', [PluginController::class, 'edit']);
    Route::delete('/plugins/{id}', [PluginController::class, 'destroy']);
    Route::get('/discount', [DiscountController::class, 'indexDiscount'])->name('indexDiscount');
    Route::post('/discount', [DiscountController::class, 'storeDiscount']);
    Route::get('/date', [DateController::class, 'dateIndex'])->name('dateIndex');


});




Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
