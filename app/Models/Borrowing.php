<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
    ];

    // transaksi dicatat oleh satu petugas/admin
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // transaksi dimiliki oleh satu member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // biar satu transaksi bisa berisi banyak detail buku
    public function details()
    {
        return $this->hasMany(BorrowingDetail::class);
    }
}