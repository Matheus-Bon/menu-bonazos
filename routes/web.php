<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\TimetableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandardAddressChange;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Client/Index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'user' => Auth::user()
        
    ]);
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('address', AddressController::class);

Route::name('addressStandard.change')->put('addressStandard/{address}/change', StandardAddressChange::class);

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'verified', 'role:admin'])->group(function () {

    /* Rotas de Visualização */
    Route::get('', [IndexAdminController::class, 'index']);
    Route::get('/orders', [IndexAdminController::class, 'orders'])->name('orders');
    Route::get('/tables', [IndexAdminController::class, 'tables'])->name('tables');
    Route::get('/delivery-area', [IndexAdminController::class, 'delivery'])->name('delivery');
    Route::get('/schedule', [IndexAdminController::class, 'schedule'])->name('schedule');
    Route::get('/evaluations', [IndexAdminController::class, 'evaluations'])->name('evaluations');

    /* Rotas de CRUD */
    //CRUD Menu
    Route::resource('menu', CategoryAdminController::class)->parameters(['menu' => 'category']);
    Route::put('menu/{category}/active-category', [CategoryAdminController::class, 'updateActiveCategory'])->name('update.active.category');

    //CRUD Timetable
    Route::resource('timetable', TimetableController::class)->parameters(['timetable' => 'id']);
    
});

require __DIR__.'/auth.php';
