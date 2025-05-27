<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::with('wallet', 'category')->get();
        return view('admin.transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $wallet = Wallet::all();
        return view('admin.transaction.create', compact('category', 'wallet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'integer'],
            'note' => ['required', 'max:100', 'string'],
            'amount' => ['integer', 'required'],
            'type' => ['required'],
            'wallet_id' => ['required', 'integer'],
            'date' => ['date', 'required'],
        ]);

        Transaction::create([
            'user_id' => Auth::user()->id,
            'wallet_id' => $request->input('wallet_id'),
            'category_id' => $request->input('category_id'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'note' => $request->input('note'),
            'date' => $request->input('date')
        ]);

        return redirect()->route('transaction.index')->with('success', 'Successfully create new transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        Gate::authorize('update', $transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
