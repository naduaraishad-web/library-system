<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
{
    $books = Book::with('category')->get();
    return view('books.index', compact('books'));
}

    public function create()
{
    $categories = Category::all();
return view('books.create', compact('categories'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|min:3|max:255',
        'author' => 'required|string|min:3|max:255',
        'year' => 'required|digits:4|integer|min:1900',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
    ]);

    Book::create($validated);
    return redirect()->route('books.index')->with('success', 'Data buku berhasil ditambahkan.');
}

    public function edit($id)
{
    $book = Book::findOrFail($id); 
    $categories = Category::all(); 
    
    return view('books.edit', compact('book', 'categories'));
}

   public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|min:3|max:255',
        'author' => 'required|string|min:3|max:255',
        'year' => 'required|digits:4|integer|min:1900',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
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