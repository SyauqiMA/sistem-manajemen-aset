<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckDirekturRole;
use App\Http\Middleware\CheckManagerDivisiRole;
use App\Http\Middleware\CheckManagerProcurementRole;

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

Route::redirect('/', '/login');

Route::view('/landing-test', 'landing-test')->middleware('auth');

Route::prefix('login')->group(function() {
    Route::view('/', 'login')->name('login-page');
    Route::post('/', [UserController::class, 'login'])->name('login');
});

Route::post('/logout', [UserController::class, 'logout']);

Route::prefix('/manajer-divisi')->middleware(['auth', CheckManagerDivisiRole::class])->group(function() {
    Route::prefix('purchase-request')->group(function() {
        Route::get('/', [PurchaseRequestController::class, 'show'])->name('manager-divisi-landing');
        Route::view('/add', 'input-purchase-request')->name('input-purchase-request');
        Route::post('/add', [PurchaseRequestController::class, 'add']);
    });
});

Route::prefix('admin')->middleware(['auth', CheckAdminRole::class])->group(function() {
    Route::get('/user-management', [UserController::class, 'getUsers'])->name('user-management');
    Route::view('/user-register', 'admin.user-register')->name('user-register-post');
    Route::post('/user-register', [UserController::class, 'register'])->name('user-register-get');
});

Route::prefix('direktur')->middleware(['auth', CheckDirekturRole::class])->group(function() {
    Route::prefix('received-purchase-requests')->group(function() {
        Route::get('/', [PurchaseRequestController::class, 'direkturShow'])->name('direktur-landing');        
        Route::post('/accept', [PurchaseRequestController::class, 'acceptPRDirektur']);
        Route::post('/reject', [PurchaseRequestController::class, 'rejectPRDirektur']);
    });
});

Route::prefix('manajer-procurement')->middleware(['auth', CheckManagerProcurementRole::class])->group(function() {
    Route::prefix('received-purchase-requests')->group(function() {
        Route::get('/', [PurchaseRequestController::class, 'manProcShow'])->name('manager-procurement-landing');
        Route::post('/accept', [PurchaseRequestController::class, 'acceptPRManProc']);
        Route::post('/reject', [PurchaseRequestController::class, 'rejectPRManProc']);
    });
});