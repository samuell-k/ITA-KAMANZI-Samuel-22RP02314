<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BankController;
use App\Http\Controllers\Auth\RegisterController;

// Home Route - Shows the login page if the user is not authenticated
Route::get('/', function () {
    // If the user is authenticated, redirect to the bank's index page
    return Auth::check() ? redirect()->route('bank.index') : view('auth.login');
});

// Bank Routes - These require authentication
Route::middleware(['auth'])->group(function () {
    // Bank-related routes
    Route::get('/bank', [BankController::class, 'index'])->name('bank.index');
    Route::post('/deposit/{account_id}', [BankController::class, 'deposit']);
    Route::post('/withdraw/{account_id}', [BankController::class, 'withdraw']);
    Route::post('/transfer', [BankController::class, 'transfer']);
    Route::get('/transactions/{account_id}', [BankController::class, 'showTransactions'])->name('transactions');
});

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Home route (Now using BankController for index after login)
Route::get('/home', [BankController::class, 'index'])->name('home');

// Include the authentication routes
require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {
    // Show transactions for a specific account
    Route::get('/transactions/{account_id}', [BankController::class, 'showTransactions'])->name('transactions');
    
    // Main bank dashboard page
    Route::get('/', [BankController::class, 'index'])->name('index');
});