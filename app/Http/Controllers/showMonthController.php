<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class showMonthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request('month'))
        {

            $transactions = Transaction::filter(request(['month', 'year']));

            $month = request('month');
            $year = request('year');

            $total = Transaction::total($transactions);
            $topThreeTransactions = Transaction::largestTransactions($transactions)->take(3);
            $transactionsCount = Transaction::transactionsCount($transactions);
            $topThreeTransactionTypes = Transaction::mostTransactionTypes($month, $year)->take(3);
            $typeBreakdown = Transaction::typeBreakdown($month, $year);

            return view('analytics/month/index', compact('month', 'year', 'typeBreakdown', 'total', 'topThreeTransactions', 'transactionsCount', 'topThreeTransactionTypes'));
        }

        $archives = Transaction::archives();
        return view('analytics/month/index', compact('archives'));
    }
}
