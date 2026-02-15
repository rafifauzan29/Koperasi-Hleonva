<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        if (!$customer) {
            return view('customer_profiles.create');
        }

        return view('customer_profiles.index', compact('customer'));
    }

    public function edit()
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        if (!$customer) {
            return redirect()->route('customer-profiles.index')->with('error', 'Data profil pelanggan tidak ditemukan.');
        }

        return view('customer_profiles.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:30',
            'phone' => 'nullable|max:15',
            'address' => 'required',
            'gender' => 'nullable|in:Laki-laki,Perempuan,Lainnya', // Tambahkan validasi untuk jenis kelamin
        ]);

        $customer = Customer::findOrFail($id);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender; // Tambahkan jenis kelamin
        $customer->updated_at = now();
        $customer->save();

        return redirect()->route('customer-profiles.index')->with('success', 'Profil pelanggan berhasil diperbarui.');
    }

    public function create()
    {
        return view('customer_profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'phone' => 'nullable|max:15',
            'address' => 'required',
            'gender' => 'nullable|in:Laki-laki,Perempuan,Lainnya', // Tambahkan validasi untuk jenis kelamin
        ]);

        $user = Auth::user();

        $lastCustomer = Customer::orderBy('id', 'desc')->first();
        if ($lastCustomer) {
            $lastCode = $lastCustomer->code;
            $lastNumber = (int) substr($lastCode, 1);
            $newNumber = $lastNumber + 1;
            $newCode = 'H' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $newCode = 'H001';
        }

        $customer = new Customer();
        $customer->user_id = $user->id;
        $customer->code = $newCode;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->save();

        return redirect()->route('customer-profiles.index')->with('success', 'Profil pelanggan berhasil disimpan.');
    }
}
