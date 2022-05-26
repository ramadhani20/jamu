<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('transaction_status', 'sukses')->sum('transaction_total');
        $sales = Transaction::where('transaction_status', 'sukses')->count();
        $sales1 = Transaction::where('transaction_status', 'proses')->count();
        $items = Transaction::orderBy('id', 'desc')->take(5)->get();
      

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'sales1' => $sales1,
            'items' => $items
          
        ]);
    }
}


