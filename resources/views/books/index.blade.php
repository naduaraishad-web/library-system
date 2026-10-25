@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
    <h2>Daftar Buku</h2>
    <a href="{{ route('books.create') }}" style="display:inline-block; margin-bottom:15px; padding:5px 10px; background:blue; color:white; text-decoration:none;">+ Tambah Buku</a>
    
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>Judul</th>
            <th>Kategori</th> <!-- Tambahan header kolom baru -->
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->category->name }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->stock }}</td>
            <td>
                <a href="{{ route('books.edit', $book) }}">Edit</a> |
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection