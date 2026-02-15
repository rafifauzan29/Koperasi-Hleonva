<?php

namespace App\Http\Controllers;
use App\Models\MandatorySaving;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerMandatorySavingController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $mandatorySavings = MandatorySaving::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get();
        return view('customer_mandatory_savings.index', compact('customer', 'mandatorySavings'));
    }
}
