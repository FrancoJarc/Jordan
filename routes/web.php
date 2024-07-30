<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\VisitanteController;

Route::resource('/productos', ProductoController::class)->middleware('is_vendedor');


Route::get('/carrito', [CartController::class,'index'])->name('carrito.index')->middleware('is_cliente');
Route::post('/carrito/add', [CartController::class, 'add'])->name('carrito.add')->middleware('is_cliente');
Route::get('/carrito/show', [CartController::class, 'show'])->name('carrito.show')-> middleware('is_cliente');
Route::delete('/carrito/remove/{id}', [CartController::class, 'remove'])->name('carrito.remove')->middleware('is_cliente');
Route::post('/carrito/comprar', [CartController::class, 'comprar'])->name('carrito.comprar')->middleware('is_cliente');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');



Route::get('/', [VisitanteController::class, 'index'])->name('visitantes.index')->middleware('is_visitante');
Route::get('/visitantes', [VisitanteController::class, 'index'])->name('visitantes.index')->middleware('is_visitante');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
