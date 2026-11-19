<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Peminjaman</title>
</head>
<body>
    <h1>Detail Transaksi Peminjaman #{{ $borrowing->id }}</h1>
    <a href="{{ route('borrowings.index') }}">Kembali ke Daftar Peminjaman</a>
    <hr>

    <p><strong>Nama Peminjam:</strong> {{ $borrowing->member->name }} ({{ $borrowing->member->member_code }})</p>
    <p><strong>Petugas yang Melayani:</strong> {{ $borrowing->user->name }}</p>
    <p><strong>Tanggal Pinjam:</strong> {{ $borrowing->borrow_date }}</p>
    <p><strong>Jatuh Tempo:</strong> {{ $borrowing->due_date }}</p>
    <p><strong>Tanggal Dikembalikan:</strong> {{ $borrowing->return_date ?? 'Belum dikembalikan' }}</p>
    <p><strong>Status:</strong> {{ strtoupper($borrowing->status) }}</p>

    <h3>Daftar Buku yang Dipinjam:</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Jumlah Dipinjam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowing->details as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->book->title ?? $detail->book->judul }}</td>
                    <td>{{ $detail->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>