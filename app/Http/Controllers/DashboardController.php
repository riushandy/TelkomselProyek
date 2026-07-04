<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Department;
use App\Models\Location;
use App\Models\Borrowing;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $availableProducts = Product::where('product_status', 'Available')->count();

        $borrowedProducts = Product::where('product_status', 'Borrowed')->count();

        $totalBorrowings = Borrowing::count();

        $lateBorrowings = Borrowing::where('borrowing_status', 'Late')->count();

        $totalCategories = Category::count();

        $totalDepartments = Department::count();

        $totalLocations = Location::count();

        $recentBorrowings = Borrowing::latest()
            ->take(5)
            ->get();

        $borrowingChart = Borrowing::select(
        DB::raw('MONTHNAME(borrow_date) as month'),
        DB::raw('COUNT(*) as total'),
        DB::raw('MONTH(borrow_date) as month_number')
    )
    ->groupBy('month', 'month_number')
    ->orderBy('month_number')
    ->get();

        return view('dashboard', compact(
    'totalProducts',
    'availableProducts',
    'borrowedProducts',
    'totalBorrowings',
    'lateBorrowings',
    'totalCategories',
    'totalDepartments',
    'totalLocations',
    'recentBorrowings',
    'borrowingChart'
));
    }
}
