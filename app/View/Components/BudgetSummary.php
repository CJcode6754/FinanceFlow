<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BudgetSummary extends Component
{
    public function __construct(
        public float $totalSpent,
        public float $totalBudget,
        public float $totalRemaining,
        public float $budgetPercentage
    ) {}

    public function render()
    {
        return view('components.budget-summary');
    }
}