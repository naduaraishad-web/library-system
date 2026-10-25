@extends('layouts.app')
@section('title', 'Edit Buku')
@section('content')
    <h2>Edit Data Buku</h2>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Judul: <input type="text" name="title" value="{{ $book->title }}"></p>
        <p>Penulis: <input type="text" name="author" value="{{ $book->author }}"></p>
        <p>Tahun: <input type="number" name="year" value="{{ $book->year }}"></p>
        <p>Stok: <input type="number" name="stock" value="{{ $book->stock }}"></p>
        <button type="submit">Update</button>
        <div style="margin-bottom: 10px;">
    <label for="category_id">Kategori</label>
<select name="category_id" class="form-control" required>
    <option value="">-- Pilih Kategori --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>
    @error('category_id') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
</div>
    </form>
@endsection