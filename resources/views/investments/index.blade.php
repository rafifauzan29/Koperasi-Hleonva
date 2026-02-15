@extends('layouts.main')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('investments.create') }}" class="btn btn-success float-end">Tambah Investasi</a>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($investments as $investment)
                            <tr id="investment-{{ $investment->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $investment->customer->name }}</td>
                                <td>{{ $investment->type }}</td>
                                <td>Rp {{ number_format($investment->amount, 0, ',', '.') }}</td>
                                <td>{{ $investment->investment_date }}</td>
                                <td>
                                    <a href="{{ route('investments.edit', $investment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form id="delete-form-{{ $investment->id }}" action="{{ route('investments.destroy', $investment->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-investment-id="{{ $investment->id }}">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data investasi</td>
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
                const investmentId = this.dataset.investmentId;
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
                        document.getElementById(`delete-form-${investmentId}`).submit();
                    }
                });
            });
        });
    </script>
@endsection
