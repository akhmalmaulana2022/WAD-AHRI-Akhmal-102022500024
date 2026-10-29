<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    // Daftar aset + form tambah (kelola-aset.php)
    public function index()
    {
        $asets = Aset::all();
        return view('aset.index', compact('asets'));
    }

    // Proses simpan (Create)
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'     => 'required|string|max:255',
            'kategori' => 'required|in:Elektronik,Furnitur,Lainnya',
            'merek'    => 'nullable|string|max:255',
            'jumlah'   => 'required|integer|min:1',
            'lokasi'   => 'nullable|string|max:255',
            'kondisi'  => 'required|in:Baik,Cukup,Rusak',
            'catatan'  => 'nullable|string',
        ]);

        // Generate kode unik dan pastikan tidak bentrok
        do {
            $kode = 'AST-' . rand(1000, 9999);
        } while (Aset::where('kode', $kode)->exists());

        Aset::create([
            'kode'              => $kode,
            'nama_barang'       => $data['nama'],
            'kategori'          => $data['kategori'],
            'merek'             => $data['merek'] ?? null,
            'jumlah'            => $data['jumlah'],
            'lokasi'            => $data['lokasi'] ?? null,
            'kondisi'           => $data['kondisi'],
            'tanggal_pengadaan' => now()->toDateString(),
            'catatan'           => $data['catatan'] ?? null,
        ]);

        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan.');
    }

    // Detail aset (detail-aset.php)
    public function show(Aset $aset)
    {
        return view('aset.show', compact('aset'));
    }

    // Proses hapus (Delete)
    public function destroy(Aset $aset)
    {
        $aset->delete();
        return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus.');
    }
}