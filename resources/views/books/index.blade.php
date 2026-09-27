@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>
    
    @foreach($books as $book)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <h3>{{ $book->title }}</h3>
            <p>Penulis: {{ $book->author }}</p>
            <p>Tahun: {{ $book->year }}</p>
            <p>Stok: {{ $book->stock }}</p>
        </div>
    @endforeach
@endsection