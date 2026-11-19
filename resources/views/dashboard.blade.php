<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Library System</title>
</head>
<body>
    <h1>Library System - Dashboard</h1>

    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('books.index') }}">Books</a> |
        <a href="{{ route('categories.index') }}">Categories</a> |
        <a href="{{ route('members.index') }}">Members</a> |
        <a href="{{ route('borrowings.index') }}">Borrowings</a>
        @can('manage-users')
            | <a href="{{ route('users.index') }}">Kelola Pengguna</a>
        @endcan
        | <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <hr>

    <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong> (Role: <strong>{{ strtoupper(auth()->user()->role) }}</strong>)</p>

    <h3>Ringkasan Data Perpustakaan</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Jumlah Kategori</th>
            <td>{{ $totalCategories }}</td>
        </tr>
        <tr>
            <th>Jumlah Judul Buku</th>
            <td>{{ $totalBooks }}</td>
        </tr>
        <tr>
            <th>Total Stok Buku Tersedia</th>
            <td>{{ $totalStock }}</td>
        </tr>
        <tr>
            <th>Jumlah Anggota (Member)</th>
            <td>{{ $totalMembers }}</td>
        </tr>
        <tr>
            <th>Total Riwayat Peminjaman</th>
            <td>{{ $totalBorrowings }}</td>
        </tr>
        <tr>
            <th>Buku Sedang Dipinjam</th>
            <td>{{ $activeBorrowings }}</td>
        </tr>
    </table>
</body>
</html>