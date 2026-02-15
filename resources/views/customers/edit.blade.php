@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Data Nasabah</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('customer.update', $customer->id) }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $customer->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Nama Nasabah:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telepon:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat:</label>
                <textarea class="form-control" id="address" name="address">{{ $customer->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Laki-laki" {{ $customer->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $customer->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <a href="{{ route('customer.index') }}" class="btn btn-secondary float-end">Kembali</a>
            <button type="submit" class="btn btn-success float-end me-2">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
