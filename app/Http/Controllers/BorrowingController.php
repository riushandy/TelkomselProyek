<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BorrowingController extends Controller
{
    public function index(Request $request)
{
    $query = Borrowing::with('user');

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('borrower_name', 'like', "%{$search}%")
              ->orWhere('borrower_phone', 'like', "%{$search}%")
              ->orWhere('borrowing_status', 'like', "%{$search}%")
              ->orWhereHas('user', function ($user) use ($search) {
                    $user->where('name', 'like', "%{$search}%");
              });

        });
    }

    $borrowings = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('borrowings.index', compact('borrowings'));
}


    public function create()
    {
        $products = Product::where('product_status', 'Available')
            ->where('stock', '>', 0)
            ->orderBy('product_name')
            ->get();

        return view('borrowings.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'borrower_name' => 'required|string|max:100',
            'borrower_phone' => 'nullable|string|max:20',
            'borrower_email' => 'nullable|email|max:100',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'notes' => 'nullable|string|max:255',
            'products' => 'required|array|min:1',
            'products.*.product_id' => [
                'required',
                Rule::exists('products', 'id'),
            ],

            'products.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {

            $borrowing = Borrowing::create([

                'user_id' => auth()->id(),

                'borrower_name' => $validated['borrower_name'],
                'borrower_phone' => $validated['borrower_phone'] ?? null,
                'borrower_email' => $validated['borrower_email'] ?? null,

                'borrow_date' => $validated['borrow_date'],
                'return_date' => $validated['return_date'],

                'borrowing_status' => 'Borrowed',

                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($validated['products'] as $item) {

                $product = Product::findOrFail($item['product_id']);

                if ($product->stock < $item['quantity']) {
                    abort(422, "Stock {$product->product_name} is insufficient.");
                }

                BorrowingDetail::create([

                    'borrowing_id' => $borrowing->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],

                ]);

                $product->decrement('stock', $item['quantity']);

                if ($product->stock <= 0) {

                    $product->update([
                        'product_status' => 'Borrowed',
                    ]);
                }
            }
        });

        return redirect()
            ->route('borrowing.index')
            ->with('success', 'Borrowing created successfully.');
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load([
            'user',
            'borrowingDetails.product.category',
        ]);

        return view('borrowings.show', compact('borrowing'));
    }

    public function return(Borrowing $borrowing)
    {
        $borrowing->load('borrowingDetails.product');

        DB::transaction(function () use ($borrowing) {

            foreach ($borrowing->borrowingDetails as $detail) {

                $product = $detail->product;

                $product->increment('stock', $detail->quantity);

                $product->update([
                    'product_status' => 'Available',
                ]);
            }

            $borrowing->update([
                'borrowing_status' => 'Returned',
                'actual_return_date' => now(),
            ]);
        });

        return redirect()
            ->route('borrowing.index')
            ->with('success', 'Product returned successfully.');
    }


}
