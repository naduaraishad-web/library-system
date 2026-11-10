<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna (Halaman Khusus Admin)</h1>
    <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} - {{ $user->email }} ({{ $user->role }})</li>
        @endforeach
    </ul>
</body>
</html>