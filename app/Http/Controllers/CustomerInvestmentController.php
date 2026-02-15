<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerInvestmentController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $investment = Investment::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get();
        return view('customer_investments.index', compact('customer', 'investment'));
    }

}
