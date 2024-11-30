@extends('layout/navbar')

@section('content')
    <h2 class="text-center">Data Karyawan</h2>
    <div style="margin-left: 20%;">
        <a href="{{ route('karyawan.create') }}" style="background-color: #078f44;" class="btn btn-primary mb-3">Tambah Karyawan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive d-flex justify-content-center">
        <table class="table table-bordered" style="width: 80%;">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Jabatan</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawan as $k)
                    <tr>
                        <td class="text-center">{{ $k->id }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->divisi->nama }}</td>
                        <td>{{ $k->jabatan->nama }}</td>
                        <td>{{ $k->no_telepon }}</td>
                        <td class="text-center">
                            <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data karyawan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
