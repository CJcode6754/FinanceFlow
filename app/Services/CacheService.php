<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    private const CACHE_TTL = 3600;

    public function remember(string $key, callable $callback, int $ttl = self::CACHE_TTL)
    {
        return Cache::remember($key, $ttl, $callback);
    }

    public function getDashBoardCacheKey(int $userId, int $months)
    {
        return "dashboard.{$userId}.{$months}";
    }

    public function getWalletCacheKey(int $userId, int $months)
    {
        return "wallet.{$userId}.{$months}";
    }

    public function getAnalyticsCacheKey(int $userId, int $months)
    {
        return "analytics.{$userId}.{$months}";
    }

    public function getSavingsCacheKey(int $userId, int $months)
    {
        return "savings.{$userId}.{$months}";
    }

    public function forget(string $key): bool
    {
        return Cache::forget($key);
    }

    public function flushUserDashboard(int $userId, int $months): void
    {
        Cache::forget($this->getDashBoardCacheKey($userId, $months));
        Cache::forget($this->getWalletCacheKey($userId, $months));
        Cache::forget($this->getAnalyticsCacheKey($userId, $months));
        Cache::forget($this->getSavingsCacheKey($userId, $months));
    }
}
