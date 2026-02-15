@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Kelola Role Pengguna</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('roles.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="is_admin" class="form-select">
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Customer</option>
                            </select>
                    </td>
                    <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
