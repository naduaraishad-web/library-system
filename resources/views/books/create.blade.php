@extends('layouts.app')
@section('title', 'Tambah Buku')
@section('content')
    <h2>Tambah Data Buku</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Judul Buku</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 10px;">
            <label>Penulis</label><br>
            <input type="text" name="author" value="{{ old('author') }}">
            @error('author') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit</label><br>
            <input type="number" name="year" value="{{ old('year') }}">
            @error('year') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 10px;">
            <label>Stok</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 10px;">
    <label for="category_id">Kategori</label><br>
    <select name="category_id" class="form-control" required>
    <option value="">-- Pilih Kategori --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
    @error('category_id') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
</div>
        <button type="submit">Simpan</button>
    </form>
@endsection