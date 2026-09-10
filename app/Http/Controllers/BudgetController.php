<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBudgetRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Budget;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $userBudgets = Budget::where('user_id', auth()->user()->id)->get();
        return view('budget.index', ['userBudgets'=> $userBudgets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getCategories = Category::where('user_id', auth()->user()->id)->get();
        return view('budget.create', ['categories' => $getCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBudgetRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Budget::create($data);
        return redirect()->route('budget.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        abort_if($budget->user_id !== auth()->id(), 403);

        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('budget.edit', ['budget' => $budget, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBudgetRequest $request, Budget $budget)
    {
       abort_if($budget->user_id !== auth()->id(), 403);

        $data = $request->validated();
        $budget->update($data);
        return redirect()->route('budget.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        abort_if($budget->user_id !== auth()->id(), 403);

        $budget->delete();
        return redirect()->route('budget.index');
    }
}
