<?php

use App\Http\Controllers\DashController;
use App\Models\Dash;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    
    // Route::get('/azman', function () {
    //     return view('dash.dashboard');
    // })->name('azman');

    Route::get('/dashboard', [DashController::class, 'dashboard'])->name('dashboard');
    // Dash Routes

    Route::get('/dash', [DashController::class,'index'])->name('dash.index');
    Route::get('/dash/create', [DashController::class, 'create']) -> name('dash.create');
    Route::get('/dash/{dash}', [DashController::class, 'show'])->name('dash.show');
    Route::get('/dash/{dash}/edit', [DashController::class, 'edit']) -> name('dash.edit');
    Route::post('/dash',[DashController::class, 'store']) -> name('dash.store');
    Route::put('/dash/{dash}', [DashController::class, 'update'])->name('dash.update');
    Route::delete('/dash/{dash}', [DashController::class, 'destroy'])-> name('dash.destroy');

});

// Route::get('/dash', [DashController::class,'index'])->name('dash.index');
// Route::get('/dash/create', [DashController::class, 'create']) -> name('dash.create');
// Route::get('/dash/{dash}', [DashController::class, 'show'])->name('dash.show');
// Route::get('/dash/{dash}/edit', [DashController::class, 'edit']) -> name('dash.edit');
// Route::post('/dash',[DashController::class, 'store']) -> name('dash.store');
// Route::put('/dash/{dash}', [DashController::class, 'update'])->name('dash.update');
// Route::delete('/dash/{dash}', [DashController::class, 'destroy'])-> name('dash.destroy');
    