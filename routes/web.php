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
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [Controllers\MainController::class, 'show']);
Route::get('/blog/', function () {
    return 'blog';
});
Route::get('/uslugi/', function () {
    return 'uslugi';
});
Route::get('/kontakty/', function () {
    return 'kontakty';
});
Route::get('/politica/', function () {
    return 'politica';
});

/**
 * динамический урл
 */
Route::get('{page}', [\App\Http\Controllers\DynamicUrl\DynamicUrlController::class, 'execute'])->where('page','.*');
