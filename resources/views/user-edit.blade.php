@extends('layout/navbar')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="text-center">Edit User</h2>
    <div class="d-flex justify-content-center">
        <form action="{{ route('user.update', $user->id) }}" method="POST" style="width: 60%;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">--Pilih role user--</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="karyawan" {{ old('role', $user->role) == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                    <option value="manajer" {{ old('role', $user->role) == 'manajer' ? 'selected' : '' }}>Manajer</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password">Password (Kosongkan jika tidak ingin diubah)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
