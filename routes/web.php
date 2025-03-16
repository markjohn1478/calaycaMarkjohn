<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/users', [TransactionController::class, 'getUsers']); 
Route::get('/products', [TransactionController::class, 'getProducts']); 
Route::get('/categories', [TransactionController::class, 'getCategories']); 
Route::get('/transactions', [TransactionController::class, 'getTransactions']); 
