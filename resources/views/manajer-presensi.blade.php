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

    <div class="container">
        <h2>Presensi Karyawan</h2>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Waktu</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($presensi as $item)
                    <tr>
                        <td>{{ $item->karyawan_id }}</td>
                        <td>{{ $item->karyawan->nama ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data presensi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
