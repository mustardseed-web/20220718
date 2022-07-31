<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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


Route::group(['middleware' => 'auth'],function() {
Route::get('/', [TodoController::class, 'index'])->name('index');
Route::post('/create', [TodoController::class, 'create'])->name('create');
Route::put('/update/{todoId}', [TodoController::class, 'update'])->name('update');
Route::delete('/delete/{todoId}', [TodoController::class, 'delete'])->name('delete');
Route::put('/search_update/{postId}', [TodoController::class, 'search_update'])->name('search_update');
Route::delete('/search_delete/{postId}', [TodoController::class, 'search_delete'])->name('search_delete');
Route::post('/search', [TodoController::class, 'search'])->name('search');
Route::get('/search_index', [TodoController::class, 'search_index'])->name('search_index');
});

require __DIR__.'/auth.php';            