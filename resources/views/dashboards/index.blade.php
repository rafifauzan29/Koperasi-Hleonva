@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Statistik -->
            @can('admin')
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        <h3>{{ $totalNasabah }}</h3>
                        <p class="card-text">Total Nasabah</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white">Lihat Detail</a>
                        <small class="text-white">{{ now()->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>
            @endcan
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        <h3>Rp {{ number_format($totalSimpanan, 0, ',', '.') }}</h3>
                        <p class="card-text">Total Simpanan</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white">Lihat Detail</a>
                        <small class="text-white">{{ now()->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        <h3>Rp {{ number_format($totalPinjaman, 0, ',', '.') }}</h3>
                        <p class="card-text">Total Pinjaman</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white">Lihat Detail</a>
                        <small class="text-white">{{ now()->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        <h3>Rp {{ number_format($totalInvestasi, 0, ',', '.') }}</h3>
                        <p class="card-text">Total Investasi</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white">Lihat Detail</a>
                        <small class="text-white">{{ now()->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
