<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>
</head>
<body>
    <h1>Tambah Pengguna Baru</h1>
    <a href="{{ route('users.index') }}">Kembali</a>
    <hr>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div><br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div><br>
        <div>
            <label>Password (minimal 6 karakter):</label><br>
            <input type="password" name="password" required>
        </div><br>
        <div>
            <label>Role:</label><br>
            <select name="role" required>
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
            </select>
        </div><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>