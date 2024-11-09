@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($books as $book)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-2">{{ $book->title }}</h2>
            <p class="text-gray-600 mb-2">By: {{ $book->author }}</p>
            <p class="text-gray-500 mb-4">{{ Str::limit($book->description, 150) }}</p>
            <div class="flex justify-between">
                <a href="{{ route('books.show', $book) }}" class="text-blue-500 hover:text-blue-600">View Details</a>
                <a href="{{ route('books.download', $book) }}" class="text-green-500 hover:text-green-600">Download PDF</a>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-6">
    {{ $books->links() }}
</div>
@endsection