<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\MandatorySaving;
use App\Models\Loan;
use App\Models\Investment;

class CustomerController extends Controller
{
    public function create() {
        return view('customers.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'code' => 'required|unique:customers|max:4',
            'name' => 'required|max:30',
            'phone' => 'numeric',
            'address' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan'
        ]);

        $customer = new Customer;
        $customer->code = $request->code;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;

        if($customer->save()){
            return redirect()->route('customer.show', $customer->id);
        } else{
            dd("Data Gagal Disimpan");
        }
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $mandatorySavings = $customer->mandatorySavings;
        $loans = Loan::where('customer_id', $customer->id)->get(); // Mengambil data pinjaman berdasarkan customer_id
        $investments = Investment::where('customer_id', $customer->id)->get(); // Mengambil data investasi berdasarkan customer_id

        return view('customers.show', compact('customer', 'mandatorySavings', 'loans', 'investments'));
    }

    public function index() {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function edit($id) {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:30',
            'phone' => 'numeric',
            'address' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan'
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;

        if($customer->save()){
            return redirect()->route('customer.index')->with('success', 'Data Berhasil Disimpan');
        } else{
            dd("Data Gagal Disimpan");
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        MandatorySaving::where('customer_id', $id)->delete();

        if ($customer->delete()) {
            return redirect()->route('customer.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            dd("Data Gagal Dihapus");
        }
    }
}
