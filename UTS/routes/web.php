<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/create', [ProductController::class, 'create'])->name('products-create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products-store');


Route::get('/product',[ProductController::class, 'index']);
Route::get('/product/create',[ProductController::class, 'create']);
Route::post('/product',[ProductController::class, 'store']);
Route::get('/product/{id}',[ProductController::class, 'show']);
Route::get('/product/{id}/edit',[ProductController::class, 'edit']);
Route::put('/product/{id}',[ProductController::class, 'update']);
Route::delete('/product/{id}',[ProductController::class, 'destroy']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('dashboard');
