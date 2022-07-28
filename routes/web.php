<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('/', \App\Http\Controllers\IndexController::class) ->name('index');
Route::post('/create', \App\Http\Controllers\CreateController::class) ->name('create');
Route::delete('/delete/{todoId}', \App\Http\Controllers\DeleteController::class)->name('delete');
Route::post('/update/{todoId}', \App\Http\Controllers\PutController::class)->name('put');
Route::post('/category', \App\Http\Controllers\CategoriesController::class)->name('category');