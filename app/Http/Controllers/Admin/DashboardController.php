<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil statistik untuk dashboard
        $statistics = [
            'total_books' => Book::count(),
            'recent_books' => Book::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('statistics'));
    }
}
