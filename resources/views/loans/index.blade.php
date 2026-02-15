@extends('layouts.main')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('loans.create') }}" class="btn btn-success float-end">Tambah Pinjaman</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Nasabah</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Tenor Pinjaman</th>
                            <th>Bunga Pinjaman (%)</th>
                            <th>Tanggal Pinjaman</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($loans as $loan)
                            <tr id="loan-{{ $loan->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->customer->name }}</td>
                                <td>Rp {{ number_format($loan->amount, 0, ',', '.') }}</td>
                                <td>{{ $loan->term }} bulan</td>
                                <td>{{ $loan->interest_rate }} %</td>
                                <td>{{ $loan->loan_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data pinjaman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SweetAlert untuk Konfirmasi Hapus -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const loanId = this.dataset.loanId;
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${loanId}`).submit();
                    }
                });
            });
        });
    </script>
@endsection
