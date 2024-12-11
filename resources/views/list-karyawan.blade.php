@extends('layout/karyawan-navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="text-center">Data Karyawan</h2>
    <div class="table-responsive d-flex justify-content-center">
        <table class="table table-bordered" style="width: 80%;">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Jabatan</th>
                    <th>No Telepon</th>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data karyawan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
