<?php

use App\Http\Controllers as C;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InstationController;
use App\Http\Controllers\Admin\InstationTypeController;
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

    Route::group(['prefix' => 'instations'], function() {
        Route::get('/', [InstationController::class, 'index'])->name('admin.instations.index');
        Route::post('/', [InstationController::class,'store'])->name('admin.instations.store');
        Route::delete('/{instation}', [InstationController::class, 'destroy'])->name('admin.instations.destroy');
        Route::patch('/{instation}', [InstationController::class, 'update'])->name('admin.instations.update');

        Route::get('/controls', [InstationController::class, 'controls'])->name('admin.instations.controls.create');
        Route::get('/controls/{instation}', [InstationController::class, 'controls'])->name('admin.instations.controls.update');

        Route::get('/{instation}', [InstationController::class, 'show'])->name('admin.instations.show');
    });

    Route::group(['prefix' => 'instation-types'], function() {
        Route::get('/', [InstationTypeController::class, 'index'])->name('admin.instation.types.index');
        Route::post('/', [InstationTypeController::class,'store'])->name('admin.instation.types.store');
        Route::delete('/{instation}', [InstationTypeController::class, 'destroy'])->name('admin.instation.types.destroy');
        Route::patch('/{instation}', [InstationTypeController::class, 'update'])->name('admin.instation.types.update');

        Route::get('/controls', [InstationTypeController::class, 'controls'])->name('admin.instation.types.controls.create');
        Route::get('/controls/{instation}', [InstationTypeController::class, 'controls'])->name('admin.instation.types.controls.update');

        Route::get('/{instation}', [InstationTypeController::class, 'show'])->name('admin.instation.types.show');
    });
});

Route::get('/cities/all', [C\CityController::class, 'all']);
