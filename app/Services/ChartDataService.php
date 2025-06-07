<?php

namespace App\Services;

use App\DTOs\ChartDataDTO;
use App\Repositories\CategoryRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\WalletRepository;

class ChartDataService
{
    public function __construct(
        private TransactionRepository $transactionRepository,
        private CategoryRepository $categoryRepository,
        private WalletRepository $walletRepository
    ) {}

    public function getChartData(int $userId, int $months): ChartDataDTO
    {
        // Monthly chart data
        $monthlyData = $this->transactionRepository->getMonthlyData($userId, $months);

        // Category chart data
        $categoryData = $this->categoryRepository->getCategoryBySpending($userId);

        // Wallet chart date
        $walletData = $this->walletRepository->getWalletDistribution($userId);

        return new ChartDataDTO(
            $monthlyData['graphIncome'],
            $monthlyData['graphExpense'],
            $monthlyData['monthLabels'],
            $categoryData['labels'],
            $categoryData['data'],
            $walletData['walletLabels'],
            $walletData['walletData'],
            // $budgetLabels['budgetLabels'],
            // $budgetData['budgetData']
        );
    }
}
