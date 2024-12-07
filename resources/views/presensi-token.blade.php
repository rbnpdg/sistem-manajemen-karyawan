@extends('layout/navbar')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">Masukkan Token</h2>
        <form action="{{ route('generate.qr') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="token">Token</label>
                <input type="text" name="token" id="token" class="form-control" placeholder="Masukkan token" required>
            </div>
            <button type="submit" class="btn btn-primary">Tampilkan QR Code</button>
        </form>
    </div>
@endsection
