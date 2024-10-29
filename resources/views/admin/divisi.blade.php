<!-- resources/views/divisi/index.blade.php -->
@extends('admin/layouts.app')

@section('content')
    <h2>Data Divisi</h2>
    <a href="{{ route('divisi.create') }}" class="btn btn-primary mb-3">Tambah Divisi</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($divisis as $divisi)
            <tr>
                <td>{{ $divisi->id }}</td>
                <td>{{ $divisi->nama }}</td>
                <td>{{ $divisi->lokasi }}</td>
                <td>
                    <a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('divisi.destroy', $divisi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
