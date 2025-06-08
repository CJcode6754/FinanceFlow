<?php

namespace App\Services;

use App\DTOs\SavingsSummaryDTO;
use App\Repositories\SavingsRepository;
use App\Traits\FinancialCalculations;

class SavingsService
{
    use FinancialCalculations;

    public function __construct(
        private SavingsRepository $savingsRepository
    ) {}

    public function getAnalyticsData(int $userId, $request = null): SavingsSummaryDTO
    {
        // Get savings data with transactions
        $savings = $this->savingsRepository->getSavingsProgress($userId);

        // Compute current amount and progress percent
        foreach ($savings as $saving) {
            $deposit = $saving->savingsTransactions->where('type', 'deposit')->sum('amount');
            $withdraw = $saving->savingsTransactions->where('type', 'withdraw')->sum('amount');

            $saving->current_amount = $deposit - $withdraw;
            $saving->process_percent = $this->calculateSavingPercentage(
                $saving->current_amount,
                $saving->target_amount
            );
        }

        $totalSaved = $this->savingsRepository->getTotalSaved($userId);
        $totalGoals = $this->savingsRepository->getTotalGoals($savings);
        $activeGoals = $this->savingsRepository->countActiveGoals($savings);
        $avgProgress = $this->savingsRepository->getAverageProgress($savings);
        $transactionHistory = $this->savingsRepository->getTransactionHistory($userId);

        $filteredSavings = $request 
            ? $this->savingsRepository->applyFilters($savings, $request)
            : $savings;

        return new SavingsSummaryDTO(
            $totalSaved,
            $totalGoals,
            $activeGoals,
            $avgProgress,
            $transactionHistory,
            $filteredSavings
        );
    }
}