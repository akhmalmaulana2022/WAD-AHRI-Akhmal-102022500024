@extends('layouts.app')

@section('title', 'Detail Aset Kos')

@section('content')
  <h2>Detail Aset</h2>
  <table>
    <tr><td>Kode Aset</td><td>{{ $aset->kode }}</td></tr>
    <tr><td>Nama Barang</td><td>{{ $aset->nama_barang }}</td></tr>
    <tr><td>Kategori</td><td>{{ $aset->kategori }}</td></tr>
    <tr><td>Merek</td><td>{{ $aset->merek }}</td></tr>
    <tr><td>Jumlah Unit</td><td>{{ $aset->jumlah }}</td></tr>
    <tr><td>Lokasi / Kamar</td><td>{{ $aset->lokasi }}</td></tr>
    <tr><td>Kondisi Fisik</td><td>{{ $aset->kondisi }}</td></tr>
    <tr><td>Tanggal Pengadaan</td><td>{{ $aset->tanggal_pengadaan }}</td></tr>
    <tr><td>Catatan</td><td>{{ $aset->catatan }}</td></tr>
  </table>

  <br>

  <h2>Hapus Aset</h2>
  <p>Apakah kamu yakin ingin menghapus aset {{ $aset->nama_barang }} ({{ $aset->kode }}) dari daftar inventaris?</p>

  <form action="{{ route('aset.destroy', $aset) }}" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('aset.index') }}">Batal</a>
    <button type="submit" name="hapus">Ya, Hapus Aset</button>
  </form>
@endsection