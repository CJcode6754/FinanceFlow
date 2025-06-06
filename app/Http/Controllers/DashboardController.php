<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private function calculateMonthlyAmount($query, $month, $year, $type)
    {
        return (clone $query)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('type', $type)
            ->sum('amount');
    }

    private function calculateChange($current, $previous)
    {
        return $previous > 0 ? (($current - $previous) / $previous) * 100 : 0;
    }

    private function calculateBalance($query, $month, $year)
    {
        return (clone $query)
            ->whereMonth('updated_at', $month)
            ->whereYear('updated_at', $year)
            ->sum('balance');
    }

    private function filteredMonths($query, $selectedMonths, $today){
        return (clone $query)
            ->whereBetween('date', [$selectedMonths, $today]);
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
        $today = Carbon::today();
        $lastMonth = $today->copy()->subMonth();

        $transactionQuery = Transaction::with(['category', 'wallet'])->where('user_id', $userId);

        $walletQuery = Wallet::with('user')->where('user_id', $userId);


        // Income: This Month & Last Month
        $thisMonthIncome = $this->calculateMonthlyAmount($transactionQuery, $today->month, $today->year, 'income');
        $lastMonthIncome = $this->calculateMonthlyAmount($transactionQuery, $lastMonth->month, $lastMonth->year, 'income');
        $incomeChange = $this->calculateChange($thisMonthIncome, $lastMonthIncome);

        // Expense: This Month & Last Month
        $thisMonthExpense = $this->calculateMonthlyAmount($transactionQuery, $today->month, $today->year, 'expense');
        $lastMonthExpense = $this->calculateMonthlyAmount($transactionQuery, $lastMonth->month, $lastMonth->year, 'expense');
        $expenseChange = $this->calculateChange($thisMonthExpense, $lastMonthExpense);

        //Balance: This Month & Last Month
        $thisMonthBalance = $this->calculateBalance($walletQuery, $today->month, $today->year);
        $lastMonthBalance = $this->calculateBalance($walletQuery, $lastMonth->month, $lastMonth->year);
        $balanceChange = $this->calculateChange($thisMonthBalance, $lastMonthBalance);

        $totalBalance = $walletQuery->sum('balance');
        $recent = $transactionQuery->orderByDesc('date')->take(5)->get();

        // --- Budget Summary (this month) ---
        $budgets = Budget::with('category')
            ->where('user_id', $userId)
            ->whereYear('start_date', $today->year)
            ->whereMonth('start_date', $today->month)
            ->limit(3)
            ->get();

        $totalSpent = 0;
        $totalBudget = 0;

        foreach ($budgets as $budget) {
            // Sum transactions in budget period for this category
            $spentAmount = $budget->category->transactions()
                ->whereBetween('date', [$budget->start_date, $budget->end_date])
                ->where('user_id', $userId)
                ->sum('amount');

            $totalSpent += $spentAmount;
            $totalBudget += $budget->amount;
        }

        $totalRemaining = $totalBudget - $totalSpent;
        $budgetPercentage = $totalBudget > 0 ? min(100, ($totalSpent / $totalBudget) * 100) : 0;

        //Spending per category 
        $categories = Category::with('transactions')->where('user_id', $userId)->get();

        $spcategoryLabels = $categories->pluck('name')->toArray();

        $spCategory = $categories->map(function ($category) {
            return $category->transactions->sum('amount');
        })->toArray();

        $months = in_array($request->filter_by_months, [1, 2, 3, 6, 9, 12]) ? (int) $request->filter_by_months : 6;

        $graphIncome = [];
        $graphExpense = [];
        $monthLabels = [];

        for ($i = $months; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $month = $date->month;
            $year = $date->year;

            $graphIncome[] = (clone $transactionQuery)
                ->whereMonth('date', $month)
                ->whereYear('date', $year)
                ->where('type', 'income')
                ->sum('amount');

            $graphExpense[] = (clone $transactionQuery)
                ->whereMonth('date', $month)
                ->whereYear('date', $year)
                ->where('type', 'expense')
                ->sum('amount');

            $monthLabels[] = $date->format('M Y');
        }

        $wallets = $walletQuery->select('name', 'balance')->get();

        return view('admin.dashboard', compact(
            'totalBalance',
            'thisMonthIncome',
            'incomeChange',
            'thisMonthExpense',
            'expenseChange',
            'balanceChange',
            'recent',
            'totalSpent',
            'totalBudget',
            'totalRemaining',
            'budgetPercentage',
            'spcategoryLabels',
            'spCategory',
            'graphIncome',
            'graphExpense',
            'wallets',
            'monthLabels'
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
