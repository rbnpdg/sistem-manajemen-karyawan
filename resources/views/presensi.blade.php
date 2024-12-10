@extends('layout/navbar')

@section('content')
    <div class="container">
        <h1>Data Presensi</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <hr> 
        <div>
            <a href="{{ route('token') }}" class="btn btn-primary">Tampilkan QR Code</a>
        </div>
        <hr>

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
                        <td>
                            <form action="{{ route('presensi.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="Hadir" {{ $item->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="Tidak Hadir" {{ $item->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                </select>
                            </form>
                        </td>
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