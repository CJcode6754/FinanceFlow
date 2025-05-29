<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::with('user')->get();
        $transactions = Transaction::with('wallet')->get();

        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');
        $totalBalance = $wallets->sum('balance');
        return view('admin.wallet.index', compact('wallets', 'expense', 'income', 'totalBalance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:45', 'string'],
            'type' => ['required'],
            'balance' => ['integer', 'required']
        ]);

        Wallet::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'balance' => $request->input('balance')
        ]);

        return redirect()->route('wallet.index')->with('success', 'Successfully created new wallet');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        Gate::authorize('update', $wallet);

        return view('admin.wallet.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {
        Gate::authorize('update', $wallet);

        $request->validate([
            'name' => ['required', 'max:45', 'string'],
            'type' => ['required'],
            'balance' => ['integer', 'required']
        ]);

        $wallet->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'balance' => $request->input('balance')
        ]);

        return redirect()->route('wallet.index')->with('success', 'Successfully edited your own wallet');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        Gate::authorize('delete', $wallet);

        $wallet->delete();

        return redirect()->route('wallet.index')->with('success', 'Successfully deleted the wallet');
    }
}
