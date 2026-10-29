<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'aset';
    public $timestamps = false;

    protected $fillable = [
        'kode', 'nama_barang', 'kategori', 'merek', 'jumlah',
        'lokasi', 'kondisi', 'tanggal_pengadaan', 'catatan',
    ];
}