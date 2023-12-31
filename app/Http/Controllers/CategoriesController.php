<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:200|unique:categories,name',
        ]);

        $category = Category::create($data);

        return to_route('categories.index');
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:200', Rule::unique('categories', 'name')->ignore($category->id)],
        ]);

        $category->update($data);

        return to_route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse{
        $category->delete();

        return to_route('categories.index');
    }
}
