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
            $chartData = $this->chartService->getChartData($userId, $months);

            return array_merge(
                $chartData->toArray(),
            );
        });
    }
}