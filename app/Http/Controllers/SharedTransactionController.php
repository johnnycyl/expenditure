<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharedTransactionController extends Controller
{
    public function index()
    {
        $shared = auth()->user()->sharedTransactions;
        return view('transactions.shared', compact('shared'));
    }
}
