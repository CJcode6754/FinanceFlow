<?php

namespace App\Services;

use App\DTOs\BudgetSummaryDTO;
use App\Repositories\BudgetRepository;
use App\Traits\FinancialCalculations;

class BudgetCalculationService
{
    use FinancialCalculations;

    public function __construct(
        private BudgetRepository $budgetRepository
    ) {}

    public function getBudgetSummary(int $userId): BudgetSummaryDTO
    {
        $budgets = $this->budgetRepository->getCurrentMonthBudgets($userId);

        $totalSpent = 0;
        $totalBudget = 0;

        foreach ($budgets as $budget) {
            $spentAmount = $this->budgetRepository->calculateBudgetSpending($budget, $userId);
            $totalSpent += $spentAmount;
            $totalBudget += $budget->amount;
        }

        $totalRemaining = $totalBudget - $totalSpent;
        $budgetPercentage = $this->calculateBudgetPercentage($totalSpent, $totalBudget);

        return new BudgetSummaryDTO(
            $totalSpent,
            $totalBudget,
            $totalRemaining,
            $budgetPercentage
        );
    }
}