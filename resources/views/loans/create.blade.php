@extends('layouts.main')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Tambah Pinjaman Baru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Pilih Nasabah</label>
                    <select name="customer_id" class="form-select" required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->code . ' - ' . $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Pinjaman</label>
                    <input type="text" class="form-control" id="amount" name="amount" required>
                </div>
                <div class="mb-3">
                    <label for="term" class="form-label">Tenor Pinjaman (bulan)</label>
                    <select class="form-select" id="term" name="term" required onchange="calculateInterest()">
                        @php
                            $tenors = [3, 6, 12]; // Definisikan tenor yang ingin ditampilkan secara dinamis
                        @endphp
                        @foreach ($tenors as $tenor)
                            <option value="{{ $tenor }}">{{ $tenor }} bulan</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="interest_rate" class="form-label">Bunga Pinjaman (%)</label>
                    <input type="text" class="form-control" id="interest_rate" name="interest_rate" readonly>
                </div>
                <button type="submit" class="btn btn-success float-end">Simpan</button>
                <a href="{{ route('loans.index') }}" class="btn btn-secondary float-end me-2">Batal</a>
            </form>
        </div>
    </div>

    <script>
        function calculateInterest() {
            var term = document.getElementById('term').value;
            var interestRateField = document.getElementById('interest_rate');

            // Logika untuk menentukan bunga berdasarkan tenor
            var interestRate = 0;
            if (term == 3) {
                interestRate = 5; // Misalnya, jika 3 bulan maka bunga 5%
            } else if (term == 6) {
                interestRate = 7; // Jika 6 bulan maka bunga 7%
            } else if (term == 12) {
                interestRate = 10; // Jika 12 bulan maka bunga 10%
            }

            // Mengisi nilai bunga pada field interest_rate
            interestRateField.value = interestRate;
        }

        // Panggil fungsi calculateInterest saat halaman dimuat ulang (misalnya jika ada edit form)
        document.addEventListener('DOMContentLoaded', function () {
            calculateInterest();
        });
    </script>
@endsection
