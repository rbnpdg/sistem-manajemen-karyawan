@extends('layout/navbar')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2 class="text-center">Edit Karyawan</h2>
<div class="d-flex justify-content-center">
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" style="width: 60%;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id">User ID</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Pilih User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $karyawan->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->id }} - {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="divisi_id">Divisi</label>
            <select name="divisi_id" id="divisi_id" class="form-control" required>
                <option value="">Pilih Divisi</option>
                @foreach ($divisi as $d)
                    <option value="{{ $d->id }}" {{ $karyawan->divisi_id == $d->id ? 'selected' : '' }}>
                        {{ $d->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jabatan_id">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                <option value="">Pilih Jabatan</option>
                @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}" {{ $karyawan->jabatan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $karyawan->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ $karyawan->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" value="{{ $karyawan->no_telepon }}" class="form-control" required>
        </div>

        <a href="{{ route('karyawan.index') }}" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
 