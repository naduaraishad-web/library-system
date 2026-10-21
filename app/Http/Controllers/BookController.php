<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|min:3|max:255',
        'author' => 'required|string|min:3|max:255',
        'year' => 'required|digits:4|integer|min:1900',
        'stock' => 'required|integer|min:0',
    ]);

    Book::create($validated);
    return redirect()->route('books.index')->with('success', 'Data buku berhasil ditambahkan.');
}

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

   public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|min:3|max:255',
        'author' => 'required|string|min:3|max:255',
        'year' => 'required|digits:4|integer|min:1900',
        'stock' => 'required|integer|min:0',
    ]);

    $book->update($validated);
    return redirect()->route('books.index')->with('success', 'Data buku berhasil diupdate.');
}

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}