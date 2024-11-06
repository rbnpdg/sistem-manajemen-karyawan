@extends('layout/navbar')

@section('content')
    <h2 class="text-center">Tambah Divisi</h2>
    <div class="d-flex justify-content-center">
        <form action="{{ route('divisi.store') }}" method="POST" style="width: 60%;">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>
            <a href="{{ route('divisi.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
