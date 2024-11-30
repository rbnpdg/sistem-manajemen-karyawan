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
                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ old('user_id', $karyawan->user_id) }}" required>
            </div>

            <div class="mb-3">
                <label for="divisi_id">Divisi ID</label>
                <input type="text" name="divisi_id" id="divisi_id" class="form-control" value="{{ old('divisi_id', $karyawan->divisi_id) }}" required>
            </div>

            <div class="mb-3">
                <label for="jabatan_id">Jabatan ID</label>
                <input type="text" name="jabatan_id" id="jabatan_id" class="form-control" value="{{ old('jabatan_id', $karyawan->jabatan_id) }}" required>
            </div>

            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $karyawan->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $karyawan->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="no_telepon">No Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon', $karyawan->no_telepon) }}" required>
            </div>

            <a href="{{ route('karyawan.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
