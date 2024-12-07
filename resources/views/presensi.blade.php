    @extends('layout/navbar')

    @section('content')
        <h2 class="text-center">Data Karyawan</h2>
        <div style="margin-left: 20%;">
            <a href="{{ route('token') }}" class="btn btn-primary">Tampilkan QR Code</a>
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
            </table>
        </div>

    @endsection
