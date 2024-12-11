@extends('layout/karyawan-navbar')

@section('content')
    <h1>Edit Profile</h1>
    <form action="{{ route('karyawan.profile.update') }}" method="POST">
        @csrf
        @method('POST') <!-- Sesuaikan dengan method POST atau PUT -->
    
        <!-- Field untuk memilih divisi -->
        <label for="divisi_id">Divisi</label>
        <select name="divisi_id" id="divisi_id">
            @foreach ($divisi as $d)
                <option value="{{ $d->id }}" {{ $karyawan->divisi_id == $d->id ? 'selected' : '' }}>
                    {{ $d->nama }}
                </option>
            @endforeach
        </select>

        <!-- Field untuk memilih jabatan -->
        <label for="jabatan_id">Jabatan</label>
        <select name="jabatan_id" id="jabatan_id">
            @foreach($jabatan as $j)
                <option value="{{ $j->id }}" {{ $j->id == $karyawan->jabatan_id ? 'selected' : '' }}>
                    {{ $j->nama }}
                </option>
            @endforeach
        </select>

        <!-- Input untuk nama -->
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $karyawan->nama) }}" required>

        <!-- Input untuk tanggal lahir -->
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir->toDateString()) }}" required>

        <!-- Input untuk alamat -->
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" required>{{ old('alamat', $karyawan->alamat) }}</textarea>

        <!-- Input untuk nomor telepon -->
        <label for="no_telepon">Nomor Telepon</label>
        <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $karyawan->no_telepon) }}" required>

        <button type="submit">Update</button>
    </form>
@endsection
