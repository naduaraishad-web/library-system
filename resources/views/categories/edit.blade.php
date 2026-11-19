<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
</head>
<body>
    <h1>Edit Kategori</h1>
    <a href="{{ route('categories.index') }}">Kembali</a>
    <hr>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Kategori:</label><br>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        </div><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>