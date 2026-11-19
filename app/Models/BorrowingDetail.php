<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowingDetail extends Model
{
    protected $fillable = [
        'borrowing_id',
        'book_id',
        'quantity',
    ];

    // Detail ini merujuk ke satu nota peminjaman
    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }

    // Detail ini merujuk ke satu judul buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}