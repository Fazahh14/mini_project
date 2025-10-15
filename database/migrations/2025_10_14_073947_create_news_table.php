<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul berita
            $table->string('slug')->unique(); // Slug untuk URL
            $table->string('description')->nullable(); // Ringkasan berita (dipakai di news.blade)
            $table->text('content')->nullable(); // Isi lengkap berita
            $table->date('date')->nullable(); // Tanggal berita (dipakai di news.blade)
            $table->string('category')->nullable(); // Kategori berita
            $table->string('image')->nullable(); // Gambar berita
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
