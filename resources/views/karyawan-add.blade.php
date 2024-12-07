@extends('layout/navbar')

@section('content')
<div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="mb-4">Tambah Karyawan</h1>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Pilih User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->email }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="divisi_id" class="form-label">Divisi</label>
            <select name="divisi_id" id="divisi_id" class="form-control" required>
                <option value="">Pilih Divisi</option>
                @foreach ($divisi as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                <option value="">Pilih Jabatan</option>
                @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
        </div>

        <a href="{{ route('karyawan.index') }}" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
