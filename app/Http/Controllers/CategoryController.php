<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display all categories
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => [
                'required',
                'string',
                'max:100',
                'unique:categories,category_name',
            ],

            'category_description' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        Category::create($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update category
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([

            'category_name' => [

                'required',
                'string',
                'max:100',

                Rule::unique('categories')
                    ->ignore($category->id),

            ],

            'category_description' => [

                'nullable',
                'string',
                'max:255',

            ],

        ]);

        $category->update($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Delete category
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'Category deleted successfully.');
    }
}
