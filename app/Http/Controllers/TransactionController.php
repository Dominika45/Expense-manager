<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Http\Requests\StoreTransactionRequest;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())->get();
        return view('transactions.index', ['transactions' => $transactions]);
    }

    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->get();
        return view('transactions.create', ['categories' => $categories]);
    }

    public function store(StoreTransactionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Transaction::create($data);
        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if($transaction->user_id !== auth()->id(), 403);

        $categories = Category::where('user_id', auth()->id())->get();
        return view('transactions.edit', ['transaction' => $transaction, 'categories' => $categories]);
    }

    public function update(StoreTransactionRequest $request, Transaction $transaction)
    {
        abort_if($transaction->user_id !== auth()->id(), 403);

        $data = $request->validated();
        $transaction->update($data);
        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        abort_if($transaction->user_id !== auth()->id(), 403);

        $transaction->delete();
        return redirect()->route('transactions.index');
    }
}
