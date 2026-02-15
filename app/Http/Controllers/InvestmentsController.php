<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Customer;
use Carbon\Carbon;

class InvestmentsController extends Controller
{
    /**
     * Menampilkan daftar investasi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investments = Investment::all(); // Ganti dengan query sesuai kebutuhan Anda
        return view('investments.index', compact('investments'));
    }

    /**
     * Menampilkan form untuk membuat investasi baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all(); // Ambil semua data nasabah untuk pilihan dropdown
        return view('investments.create', compact('customers'));
    }

    /**
     * Menyimpan investasi baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required',
            'amount' => 'required|numeric',
        ]);

        // Simpan data investasi baru
        $investment = new Investment();
        $investment->customer_id = $request->customer_id;
        $investment->type = $request->type;
        $investment->amount = $request->amount;

        // Set tanggal investasi sesuai waktu sekarang
        $investment->investment_date = now(); // or use specific date format if needed

        $investment->save();

        return redirect()->route('investments.index')->with('success', 'Investasi berhasil ditambahkan.');
    }


    /**
     * Menampilkan form untuk mengedit investasi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investment = Investment::findOrFail($id);
        $customers = Customer::all(); // Ambil semua data nasabah untuk pilihan dropdown
        return view('investments.edit', compact('investment', 'customers'));
    }

    /**
     * Update data investasi yang ada di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required|numeric',
        ]);

        // Update data investasi dengan ID tertentu
        $investment = Investment::findOrFail($id);
        $investment->type = $request->type;
        $investment->amount = $request->amount;
        $investment->save();

        return redirect()->route('investments.index')
            ->with('success', 'Data investasi berhasil diperbarui.'); // Redirect ke halaman daftar investasi dengan pesan sukses
    }

    /**
     * Menghapus investasi dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investment = Investment::findOrFail($id);
        $investment->delete();

        return redirect()->route('investments.index')->with('success', 'Data Investasi berhasil dihapus.');
    }
}
