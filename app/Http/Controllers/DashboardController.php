<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View {

        $query =Transaction::currentMonth()->where('user_id', auth()->user()->id);

       $totalExpenses = (clone $query)->sum('amount');
       $totalTransactions = (clone $query)->count();
       $averageTransaction = (clone $query)->avg('amount');

       $transactionsByCategory = Transaction::selectRaw('categories.name, SUM(transactions.amount) as total')->where('transactions.user_id', auth()->user()->id)->whereMonth('transactions.created_at', now()->month)->whereYear('transactions.created_at', now()->year)->join('categories', 'transactions.category_id', '=', 'categories.id')->groupBy('categories.name')->get();

        return view('dashboard', ['totalExpenses' => $totalExpenses, 'totalTransactions' => $totalTransactions, 'averageTransaction' => $averageTransaction, 'transactionsByCategory' => $transactionsByCategory]);
    }
}
