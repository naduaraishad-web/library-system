<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
</head>
<body>
    <h1>Tambah Kategori Baru</h1>
    <a href="{{ route('categories.index') }}">Kembali</a>
    <hr>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Kategori:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>