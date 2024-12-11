@extends('layout/manajer-navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Ini dashboard manajer</h1>
@endsection