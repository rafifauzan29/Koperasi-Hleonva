@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Investasi</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('investments.update', $investment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis Investasi</label>
                    <select class="form-select" id="type" name="type">
                        <option value="">Pilih Jenis Investasi</option>
                        <option value="Saham" {{ $investment->type == 'Saham' ? 'selected' : '' }}>Investasi Saham</option>
                        <option value="Investasi dalam Proyek" {{ $investment->type == 'Investasi dalam Proyek' ? 'selected' : '' }}>Investasi dalam Proyek</option>
                        <option value="Investasi dalam Produk" {{ $investment->type == 'Investasi dalam Produk' ? 'selected' : '' }}>Investasi dalam Produk</option>
                        <option value="Investasi Sosial" {{ $investment->type == 'Investasi Sosial' ? 'selected' : '' }}>Investasi Sosial</option>
                        <option value="Investasi Pendidikan" {{ $investment->type == 'Investasi Pendidikan' ? 'selected' : '' }}>Investasi Pendidikan</option>
                        <option value="Investasi Teknologi" {{ $investment->type == 'Investasi Teknologi' ? 'selected' : '' }}>Investasi Teknologi</option>
                        <option value="Investasi Lingkungan" {{ $investment->type == 'Investasi Lingkungan' ? 'selected' : '' }}>Investasi Lingkungan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Investasi</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $investment->amount }}">
                </div>

                <a href="{{ route('investments.index') }}" class="btn btn-secondary float-end">Kembali</a>
                <button type="submit" class="btn btn-success float-end me-2">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
