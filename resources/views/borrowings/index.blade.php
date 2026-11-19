<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
</head>
<body>
    <h1>Library System - Data Peminjaman</h1>
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

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('borrowings.create') }}">+ Catat Peminjaman Baru</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Peminjam (Member)</th>
                <th>Petugas</th>
                <th>Tgl Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->member->name }} ({{ $item->member->member_code }})</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->borrow_date }}</td>
                    <td>{{ $item->due_date }}</td>
                    <td>{{ $item->return_date ?? '-' }}</td>
                    <td>
                        <strong>{{ strtoupper($item->status) }}</strong>
                    </td>
                    <td>
                        <a href="{{ route('borrowings.show', $item->id) }}">Detail</a>
                        @if($item->status === 'borrowed')
                            | <form action="{{ route('borrowings.return', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Konfirmasi pengembalian buku?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Kembalikan</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>