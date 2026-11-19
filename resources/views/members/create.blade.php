<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
</head>
<body>
    <h1>Tambah Anggota Baru</h1>
    <a href="{{ route('members.index') }}">Kembali</a>
    <hr>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div>
            <label>Kode Anggota (contoh: MBR-001):</label><br>
            <input type="text" name="member_code" value="{{ old('member_code') }}" required>
        </div><br>
        <div>
            <label>Nama Lengkap:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div><br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div><br>
        <div>
            <label>No. HP:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}" required>
        </div><br>
        <div>
            <label>Alamat:</label><br>
            <textarea name="address" required>{{ old('address') }}</textarea>
        </div><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>