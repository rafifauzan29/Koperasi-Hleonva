<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\MandatorySaving;
use App\Models\Loan;
use App\Models\Investment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNasabah = Customer::count();
        $totalSimpanan = MandatorySaving::sum('amount');
        $totalPinjaman = Loan::sum('amount');
        $totalInvestasi = Investment::sum('amount');

        return view('dashboards.index', compact('totalNasabah', 'totalSimpanan', 'totalPinjaman', 'totalInvestasi'));
    }
}
