<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MandatorySavingController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\InvestmentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerMandatorySavingController;
use App\Http\Controllers\CustomerInvestmentController;
use App\Http\Controllers\CustomerLoanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;


// Halaman utama untuk guest
Route::get('/', function () {
    return view('welcome');
})->name('welcome.home')->middleware('guest');

// Rute Login dan Register Controller
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN \\
Route::resource('roles', RoleController::class)->middleware('admin');

// Rute untuk DashboarController
Route::resource('dashboard', DashboardController::class)->middleware('admin');

// Rute untuk CustomerController
Route::resource('customer', CustomerController::class)->middleware('admin');

// Rute untuk MandatorySavingController
Route::resource('mandatory-saving', MandatorySavingController::class)->middleware('admin');

// Rute untuk LoansController
Route::resource('loans', LoansController::class)->middleware('admin');

// Rute untuk InvestmentsController
Route::resource('investments', InvestmentsController::class)->middleware('admin');

// USER \\
// Rute untuk Dashboard Customer
Route::resource('customer-dashboard', CustomerDashboardController::class)->middleware('user');

// Rute untuk CustomerMandatorySavingController
Route::resource('customer-mandatory-savings', CustomerMandatorySavingController::class)->middleware('user');

// Rute untuk CustomerLoanController
Route::resource('customer-loans', CustomerLoanController::class)->middleware('user');

// Rute untuk CustomerInvestment
Route::resource('customer-investments', CustomerInvestmentController::class)->middleware('user');

// Rute untuk CustomerProfile
Route::resource('customer-profiles', ProfileController::class)->middleware('user');
