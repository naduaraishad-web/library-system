<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Petugas/Admin yang melayani
            $table->foreignId('member_id')->constrained()->onDelete('cascade'); // Anggota yang meminjam
            $table->date('borrow_date'); // Tanggal pinjam
            $table->date('due_date'); // Batas kembali (otomatis +7 hari)
            $table->date('return_date')->nullable(); // Diisi pas buku dikembalikan
            $table->enum('status', ['borrowed', 'returned'])->default('borrowed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
}
