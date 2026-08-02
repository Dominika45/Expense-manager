<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())->get();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Category::create($data);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        abort_if($category->user_id !== auth()->id(), 403);

        return view('categories.edit', ['category' => $category]);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        abort_if($category->user_id !== auth()->id(), 403);

        $data = $request->validated();
        $category->update($data);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        abort_if($category->user_id !== auth()->id(), 403);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
