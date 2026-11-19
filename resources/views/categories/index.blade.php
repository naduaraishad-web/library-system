<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
</head>
<body>
    <h1>Library System - Daftar Kategori</h1>
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

    @can('manage-categories')
        <p><a href="{{ route('categories.create') }}">+ Tambah Kategori</a></p>
    @endcan

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                @can('manage-categories')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    @can('manage-categories')
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>