<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <a href="{{ route('users.index') }}">Kembali</a>
    <hr>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Nama:</label><br>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div><br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div><br>
        <div>
            <label>Password Baru (kosongkan jika tidak diubah):</label><br>
            <input type="password" name="password">
        </div><br>
        <div>
            <label>Role:</label><br>
            <select name="role" required>
                <option value="petugas" {{ $user->role === 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>