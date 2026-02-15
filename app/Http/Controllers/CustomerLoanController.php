<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerLoanController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $loan = Loan::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get();
        return view('customer_loans.index', compact('customer', 'loan'));
    }

}
