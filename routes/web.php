<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;


Route::group(['middleware' => ['guest']], function() {
    // ログインフォーム表示
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');

    // ログイン処理
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    // ホーム画面表示
    Route::get('/home', [AuthController::class, 'index'])->name('home');

    // ログアウト処理
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});