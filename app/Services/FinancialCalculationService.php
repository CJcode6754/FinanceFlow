<?php

namespace App\Services;

use App\DTOs\FinancialSummaryDTO;
use App\Repositories\TransactionRepository;
use App\Repositories\WalletRepository;
use App\Traits\FinancialCalculations;
use Carbon\Carbon;

class FinancialCalculationService
{
    use FinancialCalculations;

    public function __construct(
        private TransactionRepository $transactionRepository,
        private WalletRepository $walletRepository
    ) {}

    public function getFinancialSummary(int $userId): FinancialSummaryDTO
    {
        $today = Carbon::today();
        $lastMonth = $today->copy()->subMonth();

        // Income calculations
        $thisMonthIncome = $this->transactionRepository->getMonthlyAmount(
            $userId, $today->month, $today->year, 'income'
        );
        $lastMonthIncome = $this->transactionRepository->getMonthlyAmount(
            $userId, $lastMonth->month, $lastMonth->year, 'income'
        );
        $incomeChange = $this->calculateChange($thisMonthIncome, $lastMonthIncome);

        // Expense calculations
        $thisMonthExpense = $this->transactionRepository->getMonthlyAmount(
            $userId, $today->month, $today->year, 'expense'
        );
        $lastMonthExpense = $this->transactionRepository->getMonthlyAmount(
            $userId, $lastMonth->month, $lastMonth->year, 'expense'
        );
        $expenseChange = $this->calculateChange($thisMonthExpense, $lastMonthExpense);

        // Balance calculations
        $totalBalance = $this->walletRepository->getTotalBalance($userId);
        $thisMonthBalance = $this->walletRepository->getMonthlyBalance(
            $userId, $today->month, $today->year
        );
        $lastMonthBalance = $this->walletRepository->getMonthlyBalance(
            $userId, $lastMonth->month, $lastMonth->year
        );
        $balanceChange = $this->calculateChange($thisMonthBalance, $lastMonthBalance);

        return new FinancialSummaryDTO(
            $totalBalance,
            $thisMonthIncome,
            $incomeChange,
            $thisMonthExpense,
            $expenseChange,
            $balanceChange
        );
    }
}