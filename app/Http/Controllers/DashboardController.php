<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $query = Transaction::with(['category', 'wallet'])
            ->where('user_id', Auth::user()->id);

        $transactions = $query->get();

        $walletQuery = Wallet::with('user')
            ->where('user_id', Auth::user()->id);

        $wallets = $walletQuery->get();
        $totalBalance = $wallets->sum('balance');


        $thisMonthBalance = (clone $walletQuery)->whereMonth('updated_at', $today->month)
            ->whereYear('updated_at', $today->year)
            ->sum('balance');

        $lastMonth = $today->copy()->subMonth();
        $lastMonthBalance = (clone $walletQuery)->whereMonth('updated_at', $lastMonth->month)
            ->whereYear('updated_at', $lastMonth->year)
            ->sum('balance');

        $balanceChange = 0;
        if ($lastMonthBalance > 0) {
            $balanceChange = (($thisMonthBalance - $lastMonthBalance) / $lastMonthBalance) * 100;
        }

        // Income: This Month & Last Month
        $thisMonthIncome = (clone $query)->whereMonth('date', $today->month)
            ->whereYear('date', $today->year)
            ->where('type', 'income')
            ->sum('amount');

        $lastMonth = $today->copy()->subMonth();
        $lastMonthIncome = (clone $query)->whereMonth('date', $lastMonth->month)
            ->whereYear('date', $lastMonth->year)
            ->where('type', 'income')
            ->sum('amount');

        $incomeChange = 0;
        if ($lastMonthIncome > 0) {
            $incomeChange = (($thisMonthIncome - $lastMonthIncome) / $lastMonthIncome) * 100;
        }

        // Expense: This Month & Last Month
        $thisMonthExpense = (clone $query)->whereMonth('date', $today->month)
            ->whereYear('date', $today->year)
            ->where('type', 'expense')
            ->sum('amount');

        $lastMonthExpense = (clone $query)->whereMonth('date', $lastMonth->month)
            ->whereYear('date', $lastMonth->year)
            ->where('type', 'expense')
            ->sum('amount');

        $expenseChange = 0;
        if ($lastMonthExpense > 0) {
            $expenseChange = (($thisMonthExpense - $lastMonthExpense) / $lastMonthExpense) * 100;
        }

        return view('admin.dashboard', compact(
            'transactions',
            'totalBalance',
            'thisMonthIncome',
            'incomeChange',
            'thisMonthExpense',
            'expenseChange',
            'balanceChange'
        ));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('/');
    }

    public function setting()
    {
        return view('admin.settings');
    }
}
