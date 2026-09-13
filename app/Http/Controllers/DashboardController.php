<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Budget;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View {

        $query =Transaction::currentMonth()->where('user_id', auth()->user()->id);

       $totalExpenses = (clone $query)->sum('amount');
       $totalTransactions = (clone $query)->count();
       $averageTransaction = (clone $query)->avg('amount');

       $transactionsByCategory = Transaction::selectRaw('categories.name, SUM(transactions.amount) as total')->where('transactions.user_id', auth()->user()->id)->whereMonth('transactions.created_at', now()->month)->whereYear('transactions.created_at', now()->year)->join('categories', 'transactions.category_id', '=', 'categories.id')->groupBy('categories.name')->get();

       $transactionsVsBudgets = $this->transactionsVsBudgets();

        return view('dashboard', ['totalExpenses' => $totalExpenses, 'totalTransactions' => $totalTransactions, 'averageTransaction' => $averageTransaction, 'transactionsByCategory' => $transactionsByCategory, 'transactionsVsBudgets' => $transactionsVsBudgets]);
    }

    private function transactionsVsBudgets(): array {
        $transactions = Transaction::selectRaw('categories.name, SUM(transactions.amount) as total')->where('transactions.user_id', auth()->user()->id)->whereMonth('transactions.created_at', now()->month)->whereYear('transactions.created_at', now()->year)->join('categories', 'transactions.category_id', '=', 'categories.id')->groupBy('categories.name')->get();

        $budgets = Budget::selectRaw('categories.name, budgets.limit_amount')->where('budgets.user_id', auth()->user()->id)->whereMonth('budgets.month', now()->month)->whereYear('budgets.month', now()->year)->join('categories', 'budgets.category_id', '=', 'categories.id')->get();

        $data = $transactions->map(function ($transaction) use ($budgets) {
            $budget = $budgets->firstWhere('name', $transaction->name);
            
            return [
                'category' => $transaction->name,
                'transactions' => $transaction->total,
                'budget' => $budget?->limit_amount ?? 0,
            ];
        });

        return $data->toArray();
    }
    
}
