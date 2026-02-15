<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Customer;
use Carbon\Carbon;


class LoansController extends Controller
{
    /**
     * Menampilkan daftar pinjaman.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all(); // Mengambil semua data pinjaman dari database
        return view('loans.index', compact('loans'));
    }

    /**
     * Menampilkan form untuk membuat pinjaman baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all(); // Ambil semua data nasabah dari tabel customers

        return view('loans.create', compact('customers'));
    }

    /**
     * Menyimpan pinjaman baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'customer_id' => 'required|integer',
            'amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'term' => 'required|integer',
        ]);

        // Simpan data pinjaman baru dengan loan_date otomatis
        Loan::create([
            'customer_id' => $request->customer_id,
            'amount' => $request->amount,
            'interest_rate' => $request->interest_rate,
            'term' => $request->term,
            'loan_date' => Carbon::now(), // Tanggal pinjaman otomatis
        ]);

        // Set session flash message
        return redirect()->route('loans.index')->with('success', 'Pinjaman baru berhasil ditambahkan!');
    }


    /**
     * Menampilkan form untuk mengedit pinjaman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = Loan::findOrFail($id); // Cari pinjaman berdasarkan ID atau berikan error 404 jika tidak ditemukan
        $customers = Customer::all(); // Ambil semua data nasabah dari tabel customers

        return view('loans.edit', compact('loan', 'customers')); // Tampilkan form edit pinjaman dengan data pinjaman yang ditemukan
    }

/**
 * Update data pinjaman yang ada di database.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    // Validasi data inputan
    $request->validate([
        'amount' => 'required|numeric',
    ]);

    // Update data pinjaman dengan ID tertentu
    $loan = Loan::findOrFail($id);
    $loan->amount = $request->amount;
    $loan->status = $request->status;
    $loan->save();

    return redirect()->route('loans.index')
        ->with('success', 'Data pinjaman berhasil diperbarui.'); // Redirect ke halaman daftar pinjaman dengan pesan sukses
}

    /**
     * Menghapus pinjaman dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus data pinjaman dengan ID tertentu
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('success', 'Data Pinjaman berhasil dihapus.');
    }
}
