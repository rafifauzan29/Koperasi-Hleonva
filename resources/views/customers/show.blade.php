@extends('layouts.main')

@section('content')

<div class="mb-4">
    <h1>Data Nasabah</h1>
    <table class="table">
        <tr>
            <th>Kode Nasabah</th>
            <td>: {{ $customer->code }}</td>
        </tr>
        <tr>
            <th>Nama Nasabah</th>
            <td>: {{ $customer->name }}</td>
        </tr>
        <tr>
            <th>Alamat Nasabah</th>
            <td>: {{ $customer->address }}</td>
        </tr>
        <tr>
            <th>Telepon Nasabah</th>
            <td>: {{ $customer->phone }}</td>
        </tr>
    </table>
</div>

<div class="mb-4">
    <h2>Riwayat Pembayaran Simpanan Wajib</h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customer->mandatorySavings as $ms)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ms->date }}</td>
                    <td>{{ 'Rp' . number_format($ms->amount, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data simpanan wajib</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mb-4">
    <h2>Riwayat Pinjaman</h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Nasabah</th>
                <th>Jumlah Pinjaman</th>
                <th>Tanggal Pinjaman</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
            <tr id="loan-{{ $loan->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $loan->customer->name }}</td>
                <td>{{ 'Rp' . number_format($loan->amount, 0, ',', '.') }}</td>
                <td>{{ $loan->loan_date }}</td>
                <td>{{ $loan->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data pinjaman</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mb-4">
    <h2>Riwayat Investasi</h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Nasabah</th>
                <th>Jenis Investasi</th>
                <th>Jumlah Investasi</th>
                <th>Tanggal Investasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($investments as $investment)
            <tr id="investment-{{ $investment->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $investment->customer->name }}</td>
                <td>{{ $investment->type }}</td>
                <td>{{ 'Rp' . number_format($investment->amount, 0, ',', '.') }}</td>
                <td>{{ $investment->investment_date }}</td>
                <td>{{ $investment->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data investasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
