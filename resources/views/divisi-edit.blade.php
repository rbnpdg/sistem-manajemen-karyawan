@extends('layout/navbar')

@section('content')
    <h2 class="text-center">Edit Divisi</h2>
    <div class="d-flex justify-content-center">
        <form action="{{ route('divisi.update', $divisi->id) }}" method="POST" style="width: 60%;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $divisi->nama) }}" required>
            </div>
            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $divisi->lokasi) }}" required>
            </div>
            <a href="{{ route('divisi.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
