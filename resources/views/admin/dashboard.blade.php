@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">Dashboard</h1>
    
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Books</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $statistics['total_books'] }}</p>
        </div>
        <!-- Tambahkan card statistik lainnya sesuai kebutuhan -->
    </div>

    <!-- Recent Books -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Books</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Added</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($statistics['recent_books'] as $book)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->author }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $book->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('admin.books.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-6 text-center transition duration-200">
            <h3 class="text-lg font-semibold">Add New Book</h3>
            <p class="text-sm opacity-80 mt-1">Upload a new book to the library</p>
        </a>
        <a href="{{ route('admin.books.index') }}" 
           class="bg-green-500 hover:bg-green-600 text-white rounded-lg p-6 text-center transition duration-200">
            <h3 class="text-lg font-semibold">Manage Books</h3>
            <p class="text-sm opacity-80 mt-1">View and manage existing books</p>
        </a>
    </div>
</div>
@endsection