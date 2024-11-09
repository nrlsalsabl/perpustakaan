@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>
    <p class="text-gray-600 mb-4">By: {{ $book->author }}</p>
    <div class="prose max-w-none mb-6">
        {{ $book->description }}
    </div>
    <a href="{{ route('books.download', $book) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Download PDF
    </a>
</div>
@endsection