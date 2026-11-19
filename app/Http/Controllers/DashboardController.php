<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories  = Category::count();
        $totalBooks       = Book::count();
        $totalStock       = Book::sum('stock');
        $totalMembers     = Member::count();
        $totalBorrowings  = Borrowing::count();
        $activeBorrowings = Borrowing::where('status', 'borrowed')->count();

        return view('dashboard', compact(
            'totalCategories',
            'totalBooks',
            'totalStock',
            'totalMembers',
            'totalBorrowings',
            'activeBorrowings'
        ));
    }
}