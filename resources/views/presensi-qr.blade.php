@extends('layout/navbar')

@section('content')
    <h2 class="text-center">QR Code</h2>
    <div class="d-flex justify-content-center">
        <img src="{{ $qrurl }}" alt="QR Code">
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('presensi.index') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
