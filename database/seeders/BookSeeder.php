<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book; // Jangan lupa import Model Book

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create(['title' => 'Pemrograman PHP', 'author' => 'Andi', 'year' => 2024, 'stock' => 5]);
        Book::create(['title' => 'Buku Pintar Laravel', 'author' => 'Budi', 'year' => 2025, 'stock' => 12]);
        Book::create(['title' => 'Logika Algoritma Dasar', 'author' => 'Citra', 'year' => 2023, 'stock' => 8]);
        Book::create(['title' => 'Jaringan Komputer', 'author' => 'Deni', 'year' => 2022, 'stock' => 3]);
        Book::create(['title' => 'Buku Sastra dan Puisi', 'author' => 'Eka', 'year' => 2026, 'stock' => 10]);
    }
}