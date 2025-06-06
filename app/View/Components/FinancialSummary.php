<?php

namespace App\View\Components;

use App\Traits\FinancialCalculations;
use Illuminate\View\Component;

class FinancialSummary extends Component
{
    use FinancialCalculations;

    public function __construct(
        public float $totalBalance,
        public float $balanceChange,
        public float $thisMonthIncome,
        public float $incomeChange,
        public float $thisMonthExpense,
        public float $expenseChange
    ) {}

    public function render()
    {
        return view('components.financial-summary');
    }

    public function getBalanceChangeClass(): string
    {
        return $this->getChangeClass($this->balanceChange);
    }

    public function getIncomeChangeClass(): string
    {
        return $this->getChangeClass($this->incomeChange);
    }

    public function getExpenseChangeClass(): string
    {
        return $this->getChangeClass($this->expenseChange);
    }
}
