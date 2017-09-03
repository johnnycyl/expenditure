<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('transactions/create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);

        Transaction::create([
            'name' => request('name'),
            'price' => request('price'),
            'type' => request('type'),
            'user_id' => auth()->id()
        ]);

        session()->flash('message', 'Transaction Saved');

        return redirect('/transactions/create');
    }

    public function show()
    {
        $category = request('category');

        if ($category == 'All')
        {
            $transactions = Transaction::latest()->get();
        }
        else
        {
            $transactions = Transaction::latest()->where('type', '=', $category)->get();
        }

        return view('transactions/show', compact('transactions', 'category'));
    }
}
