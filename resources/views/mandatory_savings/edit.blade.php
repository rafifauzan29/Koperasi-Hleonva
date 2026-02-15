@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Tabungan Wajib</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('mandatory-saving.update', $mandatorySaving->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-4">
                <label for="amount">Jumlah</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount"
                    name="amount" value="{{ old('amount', $mandatorySaving->amount) }}">
                @error('amount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
                <a href="{{ route('mandatory-saving.index') }}" class="btn btn-secondary float-end">Kembali</a>
                <button type="submit" class="btn btn-success float-end me-2">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
