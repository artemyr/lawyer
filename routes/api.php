<?php

use App\Http\Controllers as C;
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
        Route::get('/all', [C\Admin\CityController::class, 'all']);
        Route::get('/', [C\Admin\CityController::class, 'index'])->name('admin.city.index');
        Route::post('/', [C\Admin\CityController::class,'store'])->name('admin.city.store');
        Route::delete('/{city}', [C\Admin\CityController::class, 'destroy'])->name('admin.city.destroy');
        Route::patch('/{city}', [C\Admin\CityController::class, 'update'])->name('admin.city.update');

        Route::get('/controls', [C\Admin\CityController::class, 'controls'])->name('admin.city.controls.create');
        Route::get('/controls/{city}', [C\Admin\CityController::class, 'controls'])->name('admin.city.controls.update');

        Route::get('/{city}', [C\Admin\CityController::class, 'show'])->name('admin.city.show');

    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/', [CategoryController::class,'store'])->name('admin.categories.store');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

        Route::get('/controls', [CategoryController::class, 'controls'])->name('admin.category.controls.create');
        Route::get('/controls/{category}', [CategoryController::class, 'controls'])->name('admin.category.controls.update');

        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    });
});

Route::get('/cities/all', [C\CityController::class, 'all']);
