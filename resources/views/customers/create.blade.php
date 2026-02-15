@extends('layouts.main')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Pendaftaran Nasabah</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Kode Nasabah</label>
                    <input type="text" name="code" placeholder="Kode Nasabah" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Nama Nasabah</label>
                    <input type="text" name="name" placeholder="Nama Nasabah" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Telepon</label>
                    <input type="text" name="phone" placeholder="08xxx" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <textarea name="address" placeholder="Alamat" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Jenis Kelamin</label>
                    <select name="gender" class="form-control">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-success float-end">
                </div>
                <div class="mb-3">
                    <a href="{{ route('customer.index') }}" class="btn btn-secondary float-end me-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
