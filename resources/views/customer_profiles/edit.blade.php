<!-- customer_profiles/edit.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Biodata</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('customer-profiles.update', ['customer_profile' => $customer->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Nama Pelanggan</label>
                    <input type="text" name="name" id="name" value="{{ $customer->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Laki-laki" {{ $customer->gender === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $customer->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="phone">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ $customer->phone }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address">Alamat</label>
                    <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $customer->address }}</textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan Perubahan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
