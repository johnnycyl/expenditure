<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $archives = Transaction::archives();
        return view('analytics/month/index', compact('archives'));
    }

    public function show(string $month, string $year)
    {
        $transactions = Transaction::filter(['month' => $month, 'year' => $year]);

        $total = Transaction::total($transactions);
        $topThreeTransactions = Transaction::largestTransactions($transactions)->take(3);
        $transactionsCount = Transaction::transactionsCount($transactions);
        $topThreeTransactionTypes = Transaction::mostTransactionTypes($month, $year)->take(3);
        $typeBreakdown = Transaction::typeBreakdown($month, $year);

        return view('analytics/month/show', compact('month', 'year', 'typeBreakdown', 'total', 'topThreeTransactions', 'transactionsCount', 'topThreeTransactionTypes'));
    }
}
