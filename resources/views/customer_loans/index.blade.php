@extends('layouts.main')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Data Pinjaman</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Tenor Pinjaman</th>
                            <th>Bunga Pinjaman (%)</th>
                            <th>Tanggal Pinjaman</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($loan as $loan)
                            <tr id="loan-{{ $loan->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ number_format($loan->amount, 0, ',', '.') }}</td>
                                <td>{{ $loan->term }} bulan</td>
                                <td>{{ $loan->interest_rate }} %</td> <!-- Format bunga sebagai persen -->
                                <td>{{ $loan->loan_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pinjaman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
