@extends('layouts.main')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('mandatory-saving.create') }}" class="btn btn-success float-end">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Bayar</th>
                            <th>Kode Nasabah</th>
                            <th>Nama Nasabah</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mandatorySavings as $mandatorySaving)
                            <tr id="mandatory-saving-{{ $mandatorySaving->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mandatorySaving->date }}</td>
                                <td>{{ $mandatorySaving->customer->code }}</td>
                                <td>{{ $mandatorySaving->customer->name }}</td>
                                <td>Rp {{ number_format($mandatorySaving->amount, 0, ',', '.') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('mandatory-saving.edit', $mandatorySaving->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form id="delete-form-{{ $mandatorySaving->id }}" action="{{ route('mandatory-saving.destroy', $mandatorySaving->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-mandatory-saving-id="{{ $mandatorySaving->id }}">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data tabungan wajib</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const mandatorySavingId = this.dataset.mandatorySavingId;
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
                        document.getElementById(`delete-form-${mandatorySavingId}`).submit();
                    }
                });
            });
        });
    </script>
@endsection
