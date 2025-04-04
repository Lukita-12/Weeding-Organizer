<?php

use App\Http\Controllers\Admin\BankController as AdminBankController;
use App\Http\Controllers\Admin\PelangganController as AdminPelangganController;
use App\Http\Controllers\Admin\RequestmitraController as AdminRequestmitraController;
use App\Http\Controllers\Admin\KerjasamaController as AdminKerjasamaController;
use App\Http\Controllers\Admin\PaketPernikahanController as AdminPaketPernikahanController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;

use App\Http\Controllers\Customer\PelangganController as CustomerPelangganController;
use App\Http\Controllers\Customer\RequestmitraController as CustomerRequestmitraController;
use App\Http\Controllers\Customer\KerjasamaController as CustomerKerjasamaController;
use App\Http\Controllers\Customer\PaketPernikahanController as CustomerPaketPernikahanController;
use App\Http\Controllers\Customer\PembayaranController as CustomerPembayaranController;
use App\Http\Controllers\Customer\PesananController as CustomerPesananController;

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/home', 'home')->name('home');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::controller(AdminPelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('admin.pelanggan.index');
        Route::get('/pelanggan/create', 'create')->name('admin.pelanggan.create');
        Route::post('/pelanggan', 'store')->name('admin.pelanggan.store');
        Route::get('/pelanggan/{pelanggan}/edit', 'edit')->name('admin.pelanggan.edit');
        Route::put('/pelanggan/{pelanggan}', 'update')->name('admin.pelanggan.update');
        Route::delete('/pelanggan/{pelanggan}', 'destroy')->name('admin.pelanggan.destroy');
    });

    Route::controller(AdminRequestmitraController::class)->group(function () {
        Route::get('/requestmitra', 'index')->name('admin.requestmitra.index');
        Route::get('/requestmitra/create', 'create')->name('admin.requestmitra.create');
        Route::post('/requestmitra', 'store')->name('admin.requestmitra.store');
        Route::get('/requestmitra/{requestmitra}/edit', 'edit')->name('admin.requestmitra.edit');
        Route::put('/requestmitra/{requestmitra}', 'update')->name('admin.requestmitra.update');
        Route::delete('/requestmitra/{requestmitra}', 'destroy')->name('admin.requestmitra.destroy');
    });

    Route::controller(AdminKerjasamaController::class)->group(function () {
        Route::get('/kerjasama', 'index')->name('admin.kerjasama.index');
        Route::get('/kerjasama/create', 'create')->name('admin.kerjasama.create');
        Route::post('/kerjasama', 'store')->name('admin.kerjasama.store');
        Route::get('/kerjasama/{kerjasama}/edit', 'edit')->name('admin.kerjasama.edit');
        Route::put('/kerjasama/{kerjasama}', 'update')->name('admin.kerjasama.update');
        Route::delete('/kerjasama/{kerjasama}', 'destroy')->name('admin.kerjasama.destroy');
    });

    Route::controller(AdminPaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan', 'index')                        ->name('admin.paket_pernikahan.index');
        Route::get('/paket-pernikahan/create', 'create')                ->name('admin.paket_pernikahan.create');
        Route::post('/paket-pernikahan', 'store')                       ->name('admin.paket_pernikahan.store');
        Route::get('/paket-pernikahan/{paketPernikahan}/edit', 'edit')  ->name('admin.paket_pernikahan.edit');
        Route::put('/paket-pernikahan/{paketPernikahan}', 'update')     ->name('admin.paket_pernikahan.update');
        Route::delete('/paket-pernikahan/{paketPernikahan}', 'destroy') ->name('admin.paket_pernikahan.destroy');
    });

    Route::controller(AdminPesananController::class)->group(function () {
        Route::get('/pesanan', 'index')                 ->name('admin.pesanan.index');
        Route::get('/pesanan/create', 'create')         ->name('admin.pesanan.create');
        Route::post('/pesanan', 'store')                ->name('admin.pesanan.store');
        Route::get('/pesanan/{pesanan}/edit', 'edit')   ->name('admin.pesanan.edit');
        Route::put('/pesanan/{pesanan}', 'update')      ->name('admin.pesanan.update');
        Route::delete('/pesanan/{pesanan}', 'destroy')  ->name('admin.pesanan.destroy');
    });

    Route::controller(AdminPembayaranController::class)->group(function () {
        Route::get('/pembayaran', 'index')                  ->name('admin.pembayaran.index');
        Route::get('/pembayaran/create', 'create')          ->name('admin.pembayaran.create');
        Route::post('/pembayaran', 'store')                 ->name('admin.pembayaran.store');
        Route::get('/pembayaran/{pembayaran}/edit', 'edit') ->name('admin.pembayaran.edit');
        Route::put('/pembayaran/{pembayaran}', 'update')    ->name('admin.pembayaran.update');
        Route::delete('/pembayaran/{pembayaran}', 'destroy')->name('admin.pembayaran.destroy');
    });

    Route::controller(AdminBankController::class)->group(function () {
        Route::get('/bank', 'index')            ->name('admin.bank.index');
        Route::get('/bank/create', 'create')    ->name('admin.bank.create');
        Route::post('/bank', 'store')           ->name('admin.bank.store');
        Route::get('/bank/{bank}/edit', 'edit') ->name('admin.bank.edit');
        Route::put('/bank/{bank}', 'update')    ->name('admin.bank.update');
        Route::delete('/bank/{bank}', 'destroy')->name('admin.bank.destroy');
    });
});

Route::prefix('customer')->group(function () {
    Route::controller(CustomerPelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')                   ->name('customer.pelanggan.index');
        Route::get('/pelanggan/create', 'create')           ->name('customer.pelanggan.create')->middleware('auth');
        Route::post('/pelanggan', 'store')                  ->name('customer.pelanggan.store')->middleware('auth');
        Route::get('/pelanggan/{pelanggan}/edit', 'edit')   ->name('customer.pelanggan.edit');
        Route::put('/pelanggan/{pelanggan}', 'update')      ->name('customer.pelanggan.update')->middleware('auth');
        Route::delete('/pelanggan/{pelanggan}', 'destroy')  ->name('customer.pelanggan.destroy');
    });

    Route::controller(CustomerRequestmitraController::class)->group(function () {
        Route::get('/requestmitra', 'index')                    ->name('customer.requestmitra.index');
        Route::get('/requestmitra/create', 'create')            ->name('customer.requestmitra.create')->middleware('auth');
        Route::post('/requestmitra', 'store')                   ->name('customer.requestmitra.store');
        Route::get('/requestmitra/{requestmitra}/edit', 'edit') ->name('customer.requestmitra.edit');
        Route::put('/requestmitra/{requestmitra}', 'update')    ->name('customer.requestmitra.update');
        Route::delete('/requestmitra/{requestmitra}', 'destroy')->name('customer.requestmitra.destroy');
    });

    Route::controller(CustomerKerjasamaController::class)->group(function () {
        Route::get('/kerjasama', 'index')                   ->name('customer.kerjasama.index');
        Route::get('/kerjasama/create', 'create')           ->name('customer.kerjasama.create');
        Route::post('/kerjasama', 'store')                  ->name('customer.kerjasama.store');
        Route::get('/kerjasama/{kerjasama}/edit', 'edit')   ->name('customer.kerjasama.edit');
        Route::put('/kerjasama/{kerjasama}', 'update')      ->name('customer.kerjasama.update');
        Route::delete('/kerjasama/{kerjasama}', 'destroy')  ->name('customer.kerjasama.destroy');
    });

    Route::controller(CustomerPaketPernikahanController::class)->group(function () {
        Route::get('/paket-pernikahan', 'index')                        ->name('customer.paket_pernikahan.index');
        Route::get('/paket-pernikahan/create', 'create')                ->name('customer.paket_pernikahan.create');
        Route::post('/paket-pernikahan', 'store')                       ->name('customer.paket_pernikahan.store');
        Route::get('/paket-pernikahan/{paketPernikahan}/edit', 'edit')  ->name('customer.paket_pernikahan.edit');
        Route::put('/paket-pernikahan/{paketPernikahan}', 'update')     ->name('customer.paket_pernikahan.update');
        Route::delete('/paket-pernikahan/{paketPernikahan}', 'destroy') ->name('customer.paket_pernikahan.destroy');
    });

    Route::controller(CustomerPesananController::class)->group(function () {
        Route::get('/pesanan', 'index')
            ->middleware('auth')
            ->name('customer.pesanan.index');
        Route::get('/pesanan/{paketPernikahan}/create', 'create')
            ->middleware('auth')
            ->name('customer.pesanan.create');
        Route::post('/pesanan', 'store')                            ->name('customer.pesanan.store');
        Route::get('/pesanan/{pesanan}/edit', 'edit')               ->name('customer.pesanan.edit');
        Route::put('/pesanan/{pesanan}', 'update')                  ->name('customer.pesanan.update');
        Route::delete('/pesanan/{pesanan}', 'destroy')              ->name('customer.pesanan.destroy');
    });

    Route::controller(CustomerPembayaranController::class)->group(function () {
        Route::get('/pembayaran', 'index')                      ->name('customer.pembayaran.index');
        Route::get('/pembayaran/{pesanan}/create', 'create')
            ->middleware('auth')
            ->name('customer.pembayaran.create');
        Route::post('/pembayaran', 'store')                     ->name('customer.pembayaran.store');
        Route::get('/pembayaran/{pembayaran}/edit', 'edit')     ->name('customer.pembayaran.edit');
        Route::put('/pembayaran/{pembayaran}', 'update')        ->name('customer.pembayaran.update');
        Route::delete('/pembayaran/{pembayaran}', 'destroy')    ->name('customer.pembayaran.destroy');
    });
});