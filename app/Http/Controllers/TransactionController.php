<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Level 1: Get all users (Easy)
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Level 2: Get all products and their cart details (Moderate)
    public function getProducts()
    {
        $products = Product::with('carts')->get();
        return response()->json($products);
    }

    // Level 3: Get all transactions with user details (Challenging)
    public function getTransactions()
    {
        $transactions = Transaction::with('user')->get();
        return response()->json($transactions);
    }

    // Level 4: Get a specific user's transaction history (Difficult)
    public function getUserTransactions($userId)
    {
        $user = User::with('transactions')->find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
