<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Transaction::total(null);
        $typeBreakdown = Transaction::typeBreakdown(null, null);
        $topThreeTransactions = Transaction::largestTransactions(null)->take(3);
        $transactionsCount = Transaction::transactionsCount(null);
        $topThreeTransactionTypes = Transaction::mostTransactionTypes(null, null)->take(3);

        return view('home', compact('typeBreakdown', 'total', 'topThreeTransactions', 'transactionsCount', 'topThreeTransactionTypes'));
    }
}
