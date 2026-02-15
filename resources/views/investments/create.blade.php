@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Tambah Investasi Baru</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('investments.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="customer_id" class="form-label">Nama Nasabah</label>
                    <select class="form-select @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                        <option value="">Pilih Nasabah</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->code . ' - ' . $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis Investasi</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                        <option value="">Pilih Jenis Investasi</option>
                        <option value="Saham" {{ old('type') == 'Saham' ? 'selected' : '' }}>Investasi Saham</option>
                        <option value="Investasi dalam Proyek" {{ old('type') == 'Investasi dalam Proyek' ? 'selected' : '' }}>Investasi dalam Proyek</option>
                        <option value="Investasi dalam Produk" {{ old('type') == 'Investasi dalam Produk' ? 'selected' : '' }}>Investasi dalam Produk</option>
                        <option value="Investasi Sosial" {{ old('type') == 'Investasi Sosial' ? 'selected' : '' }}>Investasi Sosial</option>
                        <option value="Investasi Pendidikan" {{ old('type') == 'Investasi Pendidikan' ? 'selected' : '' }}>Investasi Pendidikan</option>
                        <option value="Investasi Teknologi" {{ old('type') == 'Investasi Teknologi' ? 'selected' : '' }}>Investasi Teknologi</option>
                        <option value="Investasi Lingkungan" {{ old('type') == 'Investasi Lingkungan' ? 'selected' : '' }}>Investasi Lingkungan</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Investasi</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}">
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success float-end">Simpan</button>
                <a href="{{ route('investments.index') }}" class="btn btn-secondary float-end me-2">Kembali</a>
            </form>
        </div>
    </div>
@endsection
