<?php 
namespace App\Services;

class AnalyticsService{
    public function __construct(
        private ChartDataService $chartService,
        private CacheService $cacheService,
        private SavingsService $savingsService
    ){}

    public function getAnalyticsData(int $userId, int $months){
        $cacheKey = $this->cacheService->getAnalyticsCacheKey($userId, $months);

        return $this->cacheService->remember($cacheKey, function () use ($userId, $months) {
            $savingsSummary = $this->savingsService->getAnalyticsData($userId);
            $chartData = $this->chartService->getChartData($userId, $months);

            return array_merge(
                $savingsSummary->toArray(),
                $chartData->toArray(),
            );
        });
    }
}