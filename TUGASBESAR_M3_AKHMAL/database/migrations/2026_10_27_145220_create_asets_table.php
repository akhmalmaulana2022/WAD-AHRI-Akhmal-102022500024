<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama_barang');
            $table->string('kategori', 50);
            $table->string('merek')->nullable();
            $table->unsignedInteger('jumlah')->default(1);
            $table->string('lokasi')->nullable();
            $table->string('kondisi', 20);
            $table->date('tanggal_pengadaan');
            $table->text('catatan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};