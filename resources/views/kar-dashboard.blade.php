@extends('layout/karyawan-navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Ini dashboard Karyawan</h1>
@endsection