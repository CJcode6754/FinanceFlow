<?php

namespace App\Traits;

trait FinancialCalculations
{
    protected function calculateChange(float $current, float $previous): float|int{
        return $previous > 0 ? (($current - $previous) / $previous) * 100 : 0;
    }

    protected function formatCurrency(float $amount): string{
        return '₱' . number_format($amount, 2);
    }

    protected function calculateBudgetPercentage(float $spent, float $budget): float|int{
       return $budget > 0 ? min(100, ($spent / $budget) * 100) : 0;
    }

    public function getChangeClass(float $change){
        return $change > 0 ? 'text-green-500' : 'text-red-500';
    }

    public function getChangePrefix(float $change){
        return $change >= 0 ? '+' : '-';
    }
}
