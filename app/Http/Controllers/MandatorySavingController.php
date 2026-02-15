<?php

namespace App\Http\Controllers;

use App\Models\MandatorySaving;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMandatorySavingRequest;
use App\Http\Requests\UpdateMandatorySavingRequest;

class MandatorySavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mandatorySavings = MandatorySaving::all();
        return view('mandatory_savings.index', compact('mandatorySavings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('mandatory_savings.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMandatorySavingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'amount' => 'required'
        ]);

        $mandatorySaving = new MandatorySaving;
        $mandatorySaving->date = date('Y-m-d');
        $mandatorySaving->customer_id = $request->customer_id;
        $mandatorySaving->amount = $request->amount;


        if($mandatorySaving->save()){
            return redirect()->route('mandatory-saving.index')->with('success','Data Berhasil Ditambahkan');
        } else{
            dd("Data Gagal Disimpan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MandatorySaving  $mandatorySaving
     * @return \Illuminate\Http\Response
     */
    public function show(MandatorySaving $mandatorySaving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MandatorySaving  $mandatorySaving
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Cari Tabungan Wajib berdasarkan ID
        $mandatorySaving = MandatorySaving::find($id);

        // Jika Tabungan Wajib tidak ditemukan, redirect dengan pesan error
        if (!$mandatorySaving) {
            return redirect()->route('mandatory-saving.index')
                             ->with('error', 'Tabungan Wajib tidak ditemukan');
        }

        // Ambil semua pelanggan untuk pilihan dalam formulir edit
        $customers = Customer::all();

        // Tampilkan view untuk edit dengan data Tabungan Wajib dan daftar pelanggan
        return view('mandatory_savings.edit', compact('mandatorySaving', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMandatorySavingRequest  $request
     * @param  \App\Models\MandatorySaving  $mandatorySaving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari formulir
        $this->validate($request, [
            'amount' => 'required'
        ]);

        // Cari Tabungan Wajib berdasarkan ID
        $mandatorySaving = MandatorySaving::find($id);

        // Jika Tabungan Wajib tidak ditemukan, redirect dengan pesan error
        if (!$mandatorySaving) {
            return redirect()->route('mandatory-saving.index')
                             ->with('error', 'Tabungan Wajib tidak ditemukan');
        }

        // Update hanya kolom amount
        $mandatorySaving->amount = $request->amount;

        // Simpan perubahan
        if ($mandatorySaving->save()) {
            return redirect()->route('mandatory-saving.index')
                             ->with('success', 'Data Tabungan Wajib Berhasil Diperbarui');
        } else {
            return redirect()->route('mandatory-saving.index')
                             ->with('error', 'Gagal memperbarui data Tabungan Wajib');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MandatorySaving  $mandatorySaving
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investment = MandatorySaving::findOrFail($id);
        $investment->delete();

        return redirect()->route('mandatory-saving.index')->with('success', 'Data Simpanan Wajib berhasil dihapus.');
    }
}
