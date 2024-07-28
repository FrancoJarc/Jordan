<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;


Route::resource('/productos', ProductoController::class)->middleware('is_vendedor');


Route::get('/carrito', [CartController::class,'index'])->middleware('is_cliente');

Route::post('/carrito/add', [CartController::class, 'add'])->name('carrito.add')->middleware('is_cliente');
Route::get('/carrito/show', [CartController::class, 'show'])->name('carrito.show')-> middleware('is_cliente');


Route::get('/', function () {
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
