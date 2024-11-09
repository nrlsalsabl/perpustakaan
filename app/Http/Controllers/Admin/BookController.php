<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'pdf_file' => 'required|mimes:pdf|max:10240'
        ]);

        $path = $request->file('pdf_file')->store('books', 'public');

        Book::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'author' => $validated['author'],
            'pdf_path' => $path
        ]);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book created successfully');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'pdf_file' => 'nullable|mimes:pdf|max:10240'
        ]);

        if ($request->hasFile('pdf_file')) {
            Storage::disk('public')->delete($book->pdf_path);
            $path = $request->file('pdf_file')->store('books', 'public');
            $book->pdf_path = $path;
        }

        $book->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'author' => $validated['author']
        ]);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->pdf_path);
        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book deleted successfully');
    }
}
