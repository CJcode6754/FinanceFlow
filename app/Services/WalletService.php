<?php 
namespace App\Services;

class WalletService{
    public function __construct(
        private ChartDataService $chartService,
        private CacheService $cacheService
    ){}

    public function getWalletData(int $userId, int $months){
        $cacheKey = $this->cacheService->getWalletCacheKey($userId, $months);

        return $this->cacheService->remember($cacheKey, function () use ($userId, $months) {
            // $financialSummary = $this->financialService->getFinancialSummary($userId);
            // $budgetSummary = $this->budgetService->getBudgetSummary($userId);
            $chartData = $this->chartService->getChartData($userId, $months);
            // $recentTransactions = $this->transactionRepository->getRecentTransactions($userId);
            // $wallets = $this->walletRepository->getAllWallets($userId);

            return array_merge(
                // arrays: $financialSummary->toArray(),
                // $budgetSummary->toArray(),
                $chartData->toArray(),
                // [
                //     'recent' => $recentTransactions,
                //     'wallets' => $wallets,
                // ]
            );
        });
    }
}