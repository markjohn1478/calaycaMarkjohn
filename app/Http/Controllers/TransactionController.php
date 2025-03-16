<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Fetch all users with their transactions (EASY)
     */
    public function getUsers()
    {
        $users = DB::select("
            SELECT u.*, t.price, t.type 
            FROM users u
            LEFT JOIN transaction t ON u.id = t.user_id
        ");

        return response()->json(['success' => true, 'users' => $users], 200);
    }

    /**
     * Fetch all products with categories (MODERATE)
     */
    public function getProducts()
    {
        $products = DB::table('products as p')
            ->select('p.*', 'c.name AS category_name')
            ->join('category as c', 'c.id', '=', 'p.category_id')
            ->get();

        return response()->json(['success' => true, 'products' => $products], 200);
    }

    /**
     * Fetch all categories with their products (CHALLENGING)
     */
    public function getCategories()
    {
        $categories = Category::with(['products'])->get();

        return response()->json(['success' => true, 'categories' => $categories], 200);
    }

    /**
     * Fetch all transactions with users & nested relationships (DIFFICULT)
     */
    public function getTransactions()
    {
        $transactions = Transaction::with([
            'user' => function ($q) {
                $q->select('id', 'name', 'email');
            }
        ])->get();

        return response()->json(['success' => true, 'transactions' => $transactions], 200);
    }
}


