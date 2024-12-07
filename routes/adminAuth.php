<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->middleware('guest:admin')
            ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->middleware('guest:admin');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

Route::get('notifications/markAsRead', function () {
    Auth::guard('admin')->user()->unreadNotifications->markAsRead();
})->name('notifications.markAsRead');
