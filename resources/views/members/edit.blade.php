<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
</head>
<body>
    <h1>Edit Data Anggota</h1>
    <a href="{{ route('members.index') }}">Kembali</a>
    <hr>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Kode Anggota:</label><br>
            <input type="text" name="member_code" value="{{ old('member_code', $member->member_code) }}" required>
        </div><br>
        <div>
            <label>Nama Lengkap:</label><br>
            <input type="text" name="name" value="{{ old('name', $member->name) }}" required>
        </div><br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email', $member->email) }}" required>
        </div><br>
        <div>
            <label>No. HP:</label><br>
            <input type="text" name="phone" value="{{ old('phone', $member->phone) }}" required>
        </div><br>
        <div>
            <label>Alamat:</label><br>
            <textarea name="address" required>{{ old('address', $member->address) }}</textarea>
        </div><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>