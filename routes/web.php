<?php

use App\Http\Controllers\TransactionController;

Route::get('/users', [TransactionController::class, 'getUsers']); // Level 1
Route::get('/products', [TransactionController::class, 'getProducts']); // Level 2
Route::get('/transactions', [TransactionController::class, 'getTransactions']); // Level 3
Route::get('/user-transactions/{id}', [TransactionController::class, 'getUserTransactions']); // Level 4
