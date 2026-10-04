<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();

    if ($user) {
        return redirect()->route(match ($user->role) {
            'owner' => 'owner.dashboard',
            'kasir' => 'kasir.dashboard',
            default => 'admin.dashboard',
        });
    }

    return view('landing');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/admin/dashboard', fn () => view('dashboard.index'))
    ->middleware('role:admin')
    ->name('admin.dashboard');

Route::get('/kasir/dashboard', fn () => view('dashboard.index'))
    ->middleware('role:kasir')
    ->name('kasir.dashboard');

Route::middleware('role:owner')->prefix('owner')->name('owner.')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard.index'))->name('dashboard');
    Route::get('/users', [UserManagementController::class, 'index'])->name('users');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});
