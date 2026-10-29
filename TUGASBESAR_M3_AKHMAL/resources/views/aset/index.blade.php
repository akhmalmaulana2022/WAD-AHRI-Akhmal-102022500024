@extends('layouts.app')

@section('title', 'Kelola Aset Kos')

@section('content')
  <h2>Daftar Aset</h2>
  <table>
    <tr>
      <th>Kode</th>
      <th>Nama Barang</th>
      <th>Kategori</th>
      <th>Merek</th>
      <th>Lokasi</th>
      <th>Jumlah</th>
      <th>Kondisi</th>
      <th>Aksi</th>
    </tr>
    @foreach ($asets as $aset)
      <tr>
        <td>{{ $aset->kode }}</td>
        <td>{{ $aset->nama_barang }}</td>
        <td>{{ $aset->kategori }}</td>
        <td>{{ $aset->merek }}</td>
        <td>{{ $aset->lokasi }}</td>
        <td>{{ $aset->jumlah }}</td>
        <td>{{ $aset->kondisi }}</td>
        <td><a href="{{ route('aset.show', $aset) }}">Lihat</a></td>
      </tr>
    @endforeach
  </table>

  <h2>Tambah Aset Baru</h2>

  @if ($errors->any())
    <p style="color: red;">{{ $errors->first() }}</p>
  @endif

  <form action="{{ route('aset.store') }}" method="post">
    @csrf

    <label for="nama">Nama Barang</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>

    <label for="kategori">Kategori</label>
    <select id="kategori" name="kategori">
      @foreach (['Elektronik', 'Furnitur', 'Lainnya'] as $k)
        <option value="{{ $k }}" @selected(old('kategori') == $k)>{{ $k }}</option>
      @endforeach
    </select>

    <label for="merek">Merek</label>
    <input type="text" id="merek" name="merek" value="{{ old('merek') }}">

    <label for="jumlah">Jumlah Unit</label>
    <input type="number" id="jumlah" name="jumlah" min="1" value="{{ old('jumlah', 1) }}" required>

    <label for="lokasi">Lokasi / Kamar</label>
    <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">

    <label for="kondisi">Kondisi Fisik</label>
    <select id="kondisi" name="kondisi">
      @foreach (['Baik', 'Cukup', 'Rusak'] as $k)
        <option value="{{ $k }}" @selected(old('kondisi') == $k)>{{ $k }}</option>
      @endforeach
    </select>

    <label for="catatan">Catatan</label>
    <textarea id="catatan" name="catatan" rows="3">{{ old('catatan') }}</textarea>

    <button type="submit">Simpan Aset</button>
  </form>
@endsection