@extends('layout/navbar')

@section('content')
    <h2 class="text-center">Data Divisi</h2>
    <div style="margin-left: 20%;">
        <a href="{{ route('divisi.create') }}" style="background-color: #078f44;" class="btn btn-primary mb-3">Tambah Divisi</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive d-flex justify-content-center">
        <table class="table table-bordered" style="width: 60%;">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisis as $divisi)
                    <tr>
                        <td>{{ $divisi->id }}</td>
                        <td>{{ $divisi->nama }}</td>
                        <td>{{ $divisi->lokasi }}</td>
                        <td class="text-center">
                            <a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('divisi.destroy', $divisi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
