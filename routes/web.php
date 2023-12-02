<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Auth::routes();

Route::get('/', [Controllers\MainController::class, 'show'])->name('main');

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/uslugi/', [Controllers\CategoryController::class, 'index'])->name('services');
Route::get('/blog/', [Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/kontakty/', [Controllers\ContactController::class, 'index'])->name('blog');
Route::get('/politica/', [Controllers\PolicyController::class, 'index'])->name('blog');

/**
 * admin
 */
Route::group([
    'middleware' => [
        'auth:sanctum',
        'admin'
    ],
], function() {
    Route::get('/admin{page}', [Controllers\Admin\AdminController::class, 'index'])->name('admin')->where('page', '.*');
});

/**
 * динамический урл
 */
Route::get('{page}', [Controllers\DynamicUrl\DynamicUrlController::class, 'execute'])->where('page','.*');
