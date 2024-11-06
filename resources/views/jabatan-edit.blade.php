@extends('layout/navbar')

@section('content')
    <h2 class="text-center">Edit Jabatan</h2>
    <div class="d-flex justify-content-center">
        <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST" style="width: 60%;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $jabatan->nama) }}" required>
            </div>
            <div class="mb-3">
                <label>Tunjangan</label>
                <input type="text" name="tunjangan" class="form-control" value="{{ old('tunjangan', $jabatan->tunjangan) }}" required>
            </div>
            <a href="{{ route('jabatan.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
