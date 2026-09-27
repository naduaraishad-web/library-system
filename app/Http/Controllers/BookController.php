<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import class Model-nya

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan.';
        
        // Ambil SEMUA data dari tabel books di database
        $books = Book::all();
        
        return view('books.index', compact('title', 'description', 'books'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}