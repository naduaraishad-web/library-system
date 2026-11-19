<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catat Peminjaman</title>
</head>
<body>
    <h1>Catat Peminjaman Buku</h1>
    <a href="{{ route('borrowings.index') }}">Kembali</a>
    <hr>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf
        <div>
            <label>Pilih Anggota (Member):</label><br>
            <select name="member_id" required>
                <option value="">-- Pilih Member --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->member_code }} - {{ $member->name }}</option>
                @endforeach
            </select>
        </div><br>

        <p><strong>Tanggal Pinjam:</strong> {{ now()->toDateString() }} | <strong>Jatuh Tempo:</strong> {{ now()->addDays(7)->toDateString() }}</p>

        <div id="book-list">
            <div class="book-row" style="margin-bottom: 10px;">
                <label>Buku:</label>
                <select name="book_id[]" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title ?? $book->judul }} (Stok: {{ $book->stock }})</option>
                    @endforeach
                </select>
                <label>Jumlah:</label>
                <input type="number" name="quantity[]" value="1" min="1" style="width: 60px;" required>
            </div>
        </div>

        <button type="button" onclick="addBookRow()">+ Tambah Buku Lain</button>
        <br><br>
        <button type="submit">Simpan Transaksi Peminjaman</button>
    </form>

    <script>
        function addBookRow() {
            const container = document.getElementById('book-list');
            const firstRow = container.querySelector('.book-row');
            const newRow = firstRow.cloneNode(true);
            newRow.querySelector('select').value = '';
            newRow.querySelector('input').value = 1;
            container.appendChild(newRow);
        }
    </script>
</body>
</html>