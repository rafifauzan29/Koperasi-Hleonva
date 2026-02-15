@extends('layouts.main')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Data Investasi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Nasabah</th>
                            <th>Jenis Investasi</th>
                            <th>Jumlah Investasi</th>
                            <th>Tanggal Investasi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($investment as $investment)
                            <tr id="investment-{{ $investment->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $investment->customer->name }}</td>
                                <td>{{ $investment->type }}</td>
                                <td>Rp {{ number_format($investment->amount, 0, ',', '.') }}</td>
                                <td>{{ $investment->investment_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data investasi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
