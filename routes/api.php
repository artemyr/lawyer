<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'admin',
    'middleware' => [
        'auth:sanctum',
        'admin'
    ]
], function() {
    Route::group(['prefix' => 'cities'], function() {
        Route::get('/all', [CityController::class, 'all']);
        Route::get('/', [CityController::class, 'index'])->name('admin.city.index');
        Route::get('/{city}', [CityController::class, 'show'])->name('admin.city.show');
        Route::post('/', [CityController::class,'store'])->name('admin.city.store');
        Route::delete('/{city}', [CityController::class, 'destroy'])->name('admin.city.destroy');
        Route::patch('/{city}', [CityController::class, 'update'])->name('admin.city.update');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::post('/', [CategoryController::class,'store'])->name('admin.categories.store');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    });
});

Route::get('/cities/all', [CityController::class, 'all']);
