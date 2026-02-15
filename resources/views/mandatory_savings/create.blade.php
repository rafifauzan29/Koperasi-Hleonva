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
            <h3>Pembayaran Simpanan Wajib</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('mandatory-saving.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Pilih Nasabah</label>
                    <select name="customer_id" class="form-select">
                        @foreach ($customers as $c)
                            <option value="{{ $c->id }}">{{ $c->code . ' - ' . $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Jumlah</label>
                    <input type="number" name="amount" placeholder="10000" class="form-control">
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
