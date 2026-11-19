<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
</head>
<body>
    <h1>Detail Anggota</h1>
    <a href="{{ route('members.index') }}">Kembali ke Daftar Anggota</a>
    <hr>

    <p><strong>Kode Anggota:</strong> {{ $member->member_code }}</p>
    <p><strong>Nama:</strong> {{ $member->name }}</p>
    <p><strong>Email:</strong> {{ $member->email }}</p>
    <p><strong>No. HP:</strong> {{ $member->phone }}</p>
    <p><strong>Alamat:</strong> {{ $member->address }}</p>
    <p><strong>Terdaftar Sejak:</strong> {{ $member->created_at->format('d-m-Y') }}</p>
</body>
</html>