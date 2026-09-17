@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>
    <ul>
        @foreach($books as $book)
            <li>{{ $book }} <a href="/books/1">(Lihat Detail)</a></li>
        @endforeach
    </ul>
@endsection