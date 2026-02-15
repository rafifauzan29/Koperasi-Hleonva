<!-- customer_profiles/create.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Isi Biodata</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('customer-profiles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama Pelanggan</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="phone">Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address">Alamat</label>
                    <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
