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
        <button type="submit">Simpan</button>
    </form>
@endsection