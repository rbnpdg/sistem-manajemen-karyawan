@extends('layout.karyawan-navbar')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="text-center">Edit Profil Karyawan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('karyawan.updatedata', $karyawan->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $karyawan->nama) }}" required>
                </div>

                <div class="form-group">
                    <label for="divisi_id">Divisi:</label>
                    <select id="divisi_id" name="divisi_id" class="form-control" required>
                        @foreach ($divisi as $item)
                            <option value="{{ $item->id }}" {{ $karyawan->divisi_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jabatan_id">Jabatan:</label>
                    <select id="jabatan_id" name="jabatan_id" class="form-control" required>
                        @foreach ($jabatan as $item)
                            <option value="{{ $item->id }}" {{ $karyawan->jabatan_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" class="form-control" required>{{ old('alamat', $karyawan->alamat) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="no_telepon">No. Telepon:</label>
                    <input type="text" id="no_telepon" name="no_telepon" class="form-control" value="{{ old('no_telepon', $karyawan->no_telepon) }}" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Update Profil</button>
                    <a href="{{ route('karyawan.data') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
