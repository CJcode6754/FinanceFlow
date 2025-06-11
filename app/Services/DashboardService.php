<?php

namespace App\Services;

use App\Repositories\TransactionRepository;
use App\Repositories\WalletRepository;

class DashboardService
{
    public function __construct(
        private FinancialCalculationService $financialService,
        private BudgetCalculationService $budgetService,
        private ChartDataService $chartService,
        private TransactionRepository $transactionRepository,
        private WalletRepository $walletRepository,
        private CacheService $cacheService
    ) {}

    public function getDashboardData(int $userId, int $months): array
    {
        $cacheKey = $this->cacheService->getDashboardCacheKey($userId, $months);

        return $this->cacheService->remember($cacheKey, function () use ($userId, $months) {
            $financialSummary = $this->financialService->getFinancialSummary($userId);
            $budgetSummary = $this->budgetService->getBudgetSummary($userId);
            $chartData = $this->chartService->getChartData($userId, $months);
            $recentTransactions = $this->transactionRepository->getRecentTransactions($userId);
            $wallets = $this->walletRepository->getAllWallets($userId);

            return array_merge(
                $financialSummary->toArray(),
                $budgetSummary->toArray(),
                $chartData->toArray(),
                [
                    'recent' => $recentTransactions,
                    'wallets' => $wallets,
                ]
            );
        });
    }

    public function clearCache(int $userId, int $months): void
    {
        $this->cacheService->flushUserDashboard($userId, $months);
    }
}