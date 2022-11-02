<?php

use App\Http\Controllers\LocationController;
use Illuminate\Foundation\Application;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::controller(LocationController::class)->prefix('/locations')->group(function () {
        Route::get('/', 'index')->name('locations.index');
        Route::get('/create', 'create')->name('locations.create');
        Route::post('/', 'store')->name('locations.store');
        Route::get('/{location_id}/edit', 'edit')->name('locations.edit');
        Route::put('/{location_id}', 'update')->name('locations.update');
    });
});

require __DIR__ . '/auth.php';
