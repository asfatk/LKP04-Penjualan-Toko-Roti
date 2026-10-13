
<?php

use App\Http\Controllers\StoreProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\SalesReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $user = Auth::user();

    if ($user) {
        return redirect()->route(match ($user->role) {
            'owner' => 'owner.dashboard',
            'admin_kasir' => 'admin.dashboard',
            'admin' => 'admin.dashboard',
            'kasir' => 'admin.dashboard',
            default => 'login',
        });
    }

    return view('landing');
})->name('home');


/*
|--------------------------------------------------------------------------
| Login & Logout
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN / KASIR
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin_kasir'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin/Kasir
        Route::get('/dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard');


        // Profil Pengguna
        Route::get('/profil', [AuthController::class, 'profile'])
            ->name('profile');


        // Data Produk
        Route::resource('produk', ProductController::class)
            ->parameters([
                'produk' => 'product',
            ])
            ->names('products');


        // Kasir
        Route::get('/kasir', [SaleController::class, 'create'])
            ->name('sales.create');

        Route::post('/kasir', [SaleController::class, 'store'])
            ->name('sales.store');


        // Riwayat Penjualan
        Route::get('/penjualan', [SaleController::class, 'history'])
            ->name('sales.history');

        Route::get('/penjualan/{sale}', [SaleController::class, 'show'])
            ->name('sales.show');

        Route::get('/penjualan/{sale}/struk', [SaleController::class, 'receipt'])
            ->name('sales.receipt');
    });


/*
|--------------------------------------------------------------------------
| OWNER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {

        // Dashboard Owner
        Route::get('/dashboard', function () {
            return view('dashboard.owner');
        })->name('dashboard');


        // Laporan Penjualan
        Route::get('/laporan-penjualan', [
            SalesReportController::class,
            'index',
        ])->name('reports');


        // Profil Toko
        Route::get('/profil-toko', [
            StoreProfileController::class,
            'edit',
        ])->name('profile');

        Route::put('/profil-toko', [
            StoreProfileController::class,
            'update',
        ])->name('profile.update');


        // Kelola Pengguna
        Route::get('/users', [UserManagementController::class, 'index'])
            ->name('users');

        Route::get('/users/create', [UserManagementController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [UserManagementController::class, 'store'])
            ->name('users.store');

        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])
            ->name('users.edit');

        Route::put('/users/{user}', [UserManagementController::class, 'update'])
            ->name('users.update');

        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])
            ->name('users.destroy');
    });