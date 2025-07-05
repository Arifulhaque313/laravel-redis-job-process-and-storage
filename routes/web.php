<?php

use App\Http\Controllers\RedisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redis/set', [RedisController::class, 'index']);
Route::get('/redis/get', [RedisController::class, 'getUsers']);
Route::get('/redis/delete', [RedisController::class, 'deleteUsers']);
Route::get('/redis/queue', [RedisController::class, 'dispatchJob']);
