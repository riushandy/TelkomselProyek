<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $products = Product::with(['category', 'department', 'location'])
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('product_condition', 'like', "%{$search}%")
                  ->orWhere('product_status', 'like', "%{$search}%")
                  ->orWhere('product_description', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('category_name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('department', function ($q) use ($search) {
                      $q->where('department_name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('location', function ($q) use ($search) {
                      $q->where('location_name', 'like', "%{$search}%");
                  });
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('products.index', compact('products'));
}

    public function create()
    {
        $categories = Category::orderBy('category_name')->get();
        $departments = Department::orderBy('department_name')->get();
        $locations = Location::orderBy('location_name')->get();

        return view('products.create', compact(
            'categories',
            'departments',
            'locations'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'product_name' => 'required|string|max:100',

            'category_id' => 'required|exists:categories,id',

            'department_id' => 'required|exists:departments,id',

            'location_id' => 'required|exists:locations,id',

            'stock' => 'required|integer|min:0',

            'product_condition' => [
                'required',
                Rule::in([
                    'Good',
                    'Minor Damage',
                    'Damaged'
                ])
            ],

            'product_status' => [
                'required',
                Rule::in([
                    'Available',
                    'Borrowed',
                    'Maintenance'
                ])
            ],

            'product_description' => 'nullable|string|max:255',
        ]);

        Product::create($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'Product added successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('category_name')->get();

        $departments = Department::orderBy('department_name')->get();

        $locations = Location::orderBy('location_name')->get();

        return view('products.edit', compact(
            'product',
            'categories',
            'departments',
            'locations'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([

            'product_name' => 'required|string|max:100',

            'category_id' => 'required|exists:categories,id',

            'department_id' => 'required|exists:departments,id',

            'location_id' => 'required|exists:locations,id',

            'stock' => 'required|integer|min:0',

            'product_condition' => [
                'required',
                Rule::in([
                    'Good',
                    'Minor Damage',
                    'Damaged'
                ])
            ],

            'product_status' => [
                'required',
                Rule::in([
                    'Available',
                    'Borrowed',
                    'Maintenance'
                ])
            ],

            'product_description' => 'nullable|string|max:255',
        ]);

        $product->update($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Product deleted successfully.');
    }
}
