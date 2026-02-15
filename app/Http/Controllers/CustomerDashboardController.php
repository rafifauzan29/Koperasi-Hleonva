<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MandatorySaving;
use App\Models\Loan;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerDashboardController extends Controller
{
    public function index()
    {

        $customer = Customer::where('user_id', Auth::id())->first();
        $totalSimpanan = MandatorySaving::where('customer_id', $customer)->sum('amount');
        $totalPinjaman = Loan::where('customer_id', $customer)->sum('amount');
        $totalInvestasi = Investment::where('customer_id', $customer)->sum('amount');

        return view('customer_dashboards.index', compact('totalSimpanan', 'totalPinjaman', 'totalInvestasi'));
    }
}
