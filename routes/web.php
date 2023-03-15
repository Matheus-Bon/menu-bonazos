<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/* Rota para área administrativa */
Route::get('/admin', function () {
    return view('admin.admin');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para o CRUD de endereços

    Route::post('/profile', [ProfileController::class, 'storeAddress'])->name('profile.address.post');
    Route::get('/profile/address-update-form/{code}', [ProfileController::class, 'showUpdateAddress'])->name('profile.address.form.update');
    Route::patch('/profile/address-update/{code}', [ProfileController::class, 'updateAddress'])->name('profile.address.update');
    Route::delete('/profile/address-delete/{code}', [ProfileController::class, 'destroyAddress'])->name('profile.address.destroy');
    Route::get('/profile/address-form', [ProfileController::class, 'showFormAddress'])->name('profile.address.form');
    Route::get('/profile/address-is-default/{code}', [ProfileController::class, 'updateDefaultAddress'])->name('profile.address.is_default');
    
});

require __DIR__.'/auth.php';


