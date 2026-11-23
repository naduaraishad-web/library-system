<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
</head>
<body>
    <h1>Detail Buku</h1>
    <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    <hr>

    <p><strong>Judul Buku:</strong> {{ $book->judul ?? $book->title }}</p>
    <p><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>
    <p><strong>Penulis:</strong> {{ $book->penulis ?? $book->author }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book->tahun ?? $book->year }}</p>
    <p><strong>Stok Tersedia:</strong> {{ $book->stok ?? $book->stock }}</p>
</body>
</html>