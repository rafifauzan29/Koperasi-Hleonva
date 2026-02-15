@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Pinjaman</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Pinjaman</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $loan->amount }}">
                </div>
                <a href="{{ route('loans.index') }}" class="btn btn-secondary float-end">Kembali</a>
                <button type="submit" class="btn btn-success float-end me-2">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
