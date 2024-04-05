<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckManagerDivisiRole;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/input-aset', 'input-aset');
Route::get('/lihat-aset', function () {
    return "Halaman Lihat Data aset";
});

Route::view('/landing-test', 'landing-test')->middleware('auth');

Route::prefix('login')->group(function() {
    Route::view('/', 'login')->name('login-page');
    Route::post('/', [UserController::class, 'login'])->name('login');
});

Route::post('/logout', [UserController::class, 'logout']);

Route::prefix('/manajer-divisi')->middleware(['auth', CheckManagerDivisiRole::class])->group(function() {
    Route::prefix('purchase-request')->group(function() {
        Route::get('/', [PurchaseRequestController::class, 'show'])->name('manager-divisi-landing');
        Route::view('/add', 'input-purchase-request');
        Route::post('/add', [PurchaseRequestController::class, 'add']);
    });
});

// TODO: Implement role middleware
Route::prefix('admin')->group(function() {
    Route::get('/user-management', [UserController::class, 'getUsers'])->name('user-management');
    Route::view('/user-register', 'admin.user-register')->name('user-register-post');
    Route::post('/user-register', [UserController::class, 'register'])->name('user-register-get');
});

// TODOL Implement role middleware
Route::prefix('direktur')->group(function() {
    Route::prefix('received-purchase-requests')->group(function() {
        Route::get('/', [PurchaseRequestController::class, 'direkturShow']);        
    });
});