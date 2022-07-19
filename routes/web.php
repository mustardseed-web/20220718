<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\IndexController::class) ->name('index');
Route::post('/create', \App\Http\Controllers\CreateController::class) ->name('create');
Route::delete('/delete/{todoId}', \App\Http\Controllers\DeleteController::class)->name('delete');
Route::post('/update/{todoId}', \App\Http\Controllers\Update\PutController::class)->name('put');