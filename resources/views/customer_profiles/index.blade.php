<!-- customer_profiles/index.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Biodata</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pelanggan</label>
                <p class="form-control">{{ $customer->name }}</p>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <p class="form-control">{{ $customer->gender ?: '-' }}</p> <!-- Menampilkan jenis kelamin, jika tidak tersedia maka '-' -->
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telepon</label>
                <p class="form-control">{{ $customer->phone ?: '-' }}</p> <!-- Menampilkan telepon, jika tidak tersedia maka '-' -->
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <p class="form-control">{{ $customer->address }}</p>
            </div>
            <a href="{{ route('customer-profiles.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
