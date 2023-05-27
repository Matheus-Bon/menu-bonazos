<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\StandardAddressChange;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\TimetableController;
use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// routes/web.php

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    
], function(){

    
    Route::get('/', function () {
        return Inertia::render('Client/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'user' => Auth::user(),
             
            
        ]);
    })->name('home');
    
    
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    Route::resource('address', AddressController::class);
    
    Route::name('addressStandard.change')->put('addressStandard/{address}/change', StandardAddressChange::class);
    
    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'verified', 'role:admin|manager'])->group(function () {
    
        /* Rotas de Visualização */
        Route::get('', [IndexAdminController::class, 'index']);
        Route::get('/orders', [IndexAdminController::class, 'orders'])->name('orders');
        Route::get('/tables', [IndexAdminController::class, 'tables'])->name('tables');
        Route::get('/delivery-area', [IndexAdminController::class, 'delivery'])->name('delivery');
        Route::get('/schedule', [IndexAdminController::class, 'schedule'])->name('schedule');
        Route::get('/evaluations', [IndexAdminController::class, 'evaluations'])->name('evaluations');
    
        
        //Rotas Menu
        Route::prefix('menu')->name('menu.')->group(function(){

            Route::resource('', CategoryAdminController::class)->parameters(['' => 'category'])->except(['create', 'edit']); // Rotas referente ao CRUD de categorias
            Route::put('menu/{category}/active-category', [CategoryAdminController::class, 'updateActiveCategory'])->name('update.active.category'); // Rota para ativar categoria

        });
        
        
        //Rotas Timetable 
        Route::prefix('timetable')->name('timetable.')->group(function(){

            Route::resource('', TimetableController::class)->except(['destroy', 'show', 'edit'])->parameters(['' => 'timetable']); // Rotas referente ao CRUD de timetable (Horario de Funcionamento)
            Route::resource('holiday', HolidayController::class)->only(['edit', 'update', 'store', 'show', 'destroy']); // Rotas referente ao CRUD de holiday
            Route::patch('{timetable}/active-day', [TimetableController::class, 'updateActiveDay'])->name('active-day'); // Rota para ativar o dia de trabalho

        });
    
        //Rotas Unidade 
        Route::prefix('unit')->name('unit.')->group(function(){

            Route::resource('', UnitController::class)->only(['index', 'store']);   // Rotas referente ao CRUD de unidade
            Route::resource('manager', ManagerController::class)->only(['store']);  // Rotas referente ao CRUD de manager

        });
    
    });



});





require __DIR__.'/auth.php';
