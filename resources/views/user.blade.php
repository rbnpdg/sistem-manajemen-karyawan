@extends('layout/navbar')

@section('content')
    <h2 class="text-center">Data User</h2>
    <div style="margin-left: 20%;">
        <a href="{{ route('user.create') }}" style="background-color: #078f44;" class="btn btn-primary mb-3">Tambah User</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive d-flex justify-content-center">
        <table class="table table-bordered" style="width: 80%;">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data user</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
