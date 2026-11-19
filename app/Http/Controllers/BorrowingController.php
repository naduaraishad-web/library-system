<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    // Menampilkan semua riwayat peminjaman
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    // Menampilkan form transaksi peminjaman baru
    public function create()
    {
        $members = Member::all();
        // Hanya tampilkan buku yang stoknya masih ada (> 0)
        $books = Book::where('stock', '>', 0)->get();

        return view('borrowings.create', compact('members', 'books'));
    }

    // Menyimpan transaksi peminjaman & mengurangi stok buku
    public function store(Request $request)
    {
        $request->validate([
            'member_id'    => 'required|exists:members,id',
            'book_id'      => 'required|array|min:1',
            'book_id.*'    => 'required|exists:books,id',
            'quantity'     => 'required|array|min:1',
            'quantity.*'   => 'required|integer|min:1',
        ]);

        // Cek ketersediaan stok dulu sebelum simpan
        foreach ($request->book_id as $index => $bookId) {
            $book = Book::findOrFail($bookId);
            $qty = $request->quantity[$index];

            if ($book->stock < $qty) {
                return back()->withErrors([
                    'stock' => "Stok buku '{$book->title}' tidak mencukupi (sisa: {$book->stock})."
                ])->withInput();
            }
        }

        // DB::transaction memastikan semua tersimpan utuh; kalau ada error, semua dibatalkan
        DB::transaction(function () use ($request) {
            $borrowing = Borrowing::create([
                'user_id'     => Auth::id(),
                'member_id'   => $request->member_id,
                'borrow_date' => now()->toDateString(),
                'due_date'    => now()->addDays(7)->toDateString(), // Jatuh tempo 1 minggu
                'status'      => 'borrowed',
            ]);

            foreach ($request->book_id as $index => $bookId) {
                $qty = $request->quantity[$index];

                BorrowingDetail::create([
                    'borrowing_id' => $borrowing->id,
                    'book_id'      => $bookId,
                    'quantity'     => $qty,
                ]);

                // Kurangi stok buku
                Book::where('id', $bookId)->decrement('stock', $qty);
            }
        });

        return redirect()->route('borrowings.index')->with('success', 'Transaksi peminjaman berhasil dicatat.');
    }

    // Menampilkan detail transaksi peminjaman
    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['member', 'user', 'details.book']);
        return view('borrowings.show', compact('borrowing'));
    }

    // Proses pengembalian buku & menambah kembali stok buku
    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->status === 'returned') {
            return back()->with('success', 'Buku pada transaksi ini sudah dikembalikan sebelumnya.');
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'return_date' => now()->toDateString(),
                'status'      => 'returned',
            ]);

            // Kembalikan stok setiap buku yang dipinjam
            foreach ($borrowing->details as $detail) {
                Book::where('id', $detail->book_id)->increment('stock', $detail->quantity);
            }
        });

        return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dikembalikan dan stok telah diperbarui.');
    }
}