<?php 
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService{
    private const CACHE_TTL = 3600;

    public function remember(string $key, callable $callback, int $ttl = self::CACHE_TTL){
        return Cache::remember($key, $ttl, $callback);
    }

    public function getDashBoardCacheKey(int $userId, int $months){
        return "dashboard.{$userId}.{$months}" . now()->format('Y-m-d-H');
    }

    public function getWalletCacheKey(int $userId, int $months){
        return "wallet.{$userId}.{$months}" . now()->format('Y-m-d-H');
    }

    public function getAnalyticsCacheKey(int $userId, int $months){
        return "wallet.{$userId}.{$months}" . now()->format('Y-m-d-H');
    }

    public function forget(string $key): bool
    {
        return Cache::forget($key);
    }

    public function flushUserDashboard(int $userId): void
    {
        $pattern = "dashboard.{$userId}.*";
        // Note: In production, consider using Redis with pattern-based deletion
        Cache::flush(); // Simple approach - in production, use more targeted approach
    }
}