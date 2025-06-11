<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WalletController extends Controller
{
    public function __construct(
        private WalletService $walletService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $chartDatas = $this->walletService->getWalletData($userId, 6);

        $wallets = Wallet::with('user')
            ->where('user_id', $userId)
            ->get();
        $transactions = Transaction::with('wallet', 'category')
            ->where('user_id', $userId)
            ->get();
        $categories = Category::with('transactions')
            ->where('user_id', $userId)
            ->get();

        // Extract chart data from the service response
        $chartLabels = $chartDatas['categoryLabels'] ?? [];
        $chartData = $chartDatas['categoryData'] ?? [];
        $walletLabels = $chartDatas['walletLabels'] ?? [];
        $walletData = $chartDatas['walletData'] ?? [];

        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');
        $totalBalance = $wallets->sum('balance');

        return view('admin.wallet.index', compact('wallets', 'expense', 'income', 'totalBalance', 'chartLabels', 'chartData', 'walletLabels', 'walletData'));
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
