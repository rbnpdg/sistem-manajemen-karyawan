@extends('layout/karyawan-navbar')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="text-center">Profil Karyawan</h4>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="mb-3"><strong>Nama:</strong> {{ $karyawan->nama }}</h5>
                    <p><strong>Divisi:</strong> {{ $karyawan->divisi->nama }}</p>
                    <p><strong>Jabatan:</strong> {{ $karyawan->jabatan->nama }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $karyawan->tanggal_lahir }}</p>
                    <p><strong>Alamat:</strong> {{ $karyawan->alamat }}</p>
                    <p><strong>No. Telepon:</strong> {{ $karyawan->no_telepon }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('karyawan.profile.edit') }}" class="btn btn-warning">Edit Profil</a>
        </div>
    </div>
</div>
@endsection
